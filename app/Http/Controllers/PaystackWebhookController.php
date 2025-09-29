<?php

namespace App\Http\Controllers;

use App\Models\Donation;
use App\Models\PaystackTransaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaystackWebhookController extends Controller
{
    public function handle(Request $request)
    {
        // Step 1: Verify source using Paystack secret
        $paystackSecret = config('services.paystack.secret_key');
        $signature = $request->header('x-paystack-signature');

        $payload = $request->getContent();

        if (hash_hmac('sha512', $payload, $paystackSecret) !== $signature) {
            Log::warning('Invalid Paystack signature on webhook');
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Step 2: Decode payload
        $data = $request->json('data');
        $event = $request->json('event');

        if (!$data || !$event) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        $reference = $data['reference'];

        // Step 3: Check if transaction already exists
        $existing = PaystackTransaction::where('reference', $reference)->first();
        if ($existing) {
            Log::info("Webhook received for existing transaction: {$reference}");
            return response()->json(['message' => 'Already processed'], 200);
        }

        // Step 4: Save transaction
        PaystackTransaction::create([
            'reference' => $reference,
            'status' => $data['status'],
            'currency' => $data['currency'],
            'amount' => $data['amount'] / 100,
            'customer_email' => $data['customer']['email'] ?? null,
            'customer_phone' => $data['customer']['phone'] ?? null,
            'gateway_response' => $data['gateway_response'] ?? null,
            'channel' => $data['channel'] ?? null,
            'bank' => $data['authorization']['bank'] ?? null,
            'card_type' => $data['authorization']['card_type'] ?? null,
            'payload' => $data,
        ]);

        // Step 5: Optional - Find donation by reference and mark as verified
        $donation = Donation::where('payment_reference', $reference)->first();
        if ($donation) {
            $donation->update(['status' => 'paid']);
            Log::info("Donation {$donation->id} marked as paid via webhook.");
        }

        return response()->json(['message' => 'Webhook received'], 200);
    }
}
