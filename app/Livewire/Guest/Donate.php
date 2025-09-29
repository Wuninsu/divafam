<?php

namespace App\Livewire\Guest;

use App\Models\Donation;
use App\Models\Donor;
use App\Models\PaystackTransaction;
use App\Models\Project;
use App\Notifications\DonationThankYou;
use Binkode\Paystack\Support\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class Donate extends Component
{
    use WithFileUploads;

    // Donor Information
    public $is_donor = 1; // Default to donor
    public $donor_name;
    public $contact_person;
    public $email;
    public $phone;
    public $address;
    public $donor_type; // Donor type
    public $logo;

    // Donation Information
    public $amount;
    public $currency;
    public $donation_type;
    public $item_description;
    public $donation_date;
    public $notes;
    public $projects;

    public string $paymentReference;


    public function mount()
    {
        $this->projects = Project::all(); // Load projects
    }


    public function initiatePayment()
    {
        // Step 1: Validate donation fields
        $this->validate([
            'amount' => 'required|numeric',
            'currency' => 'required|string',
            'donation_type' => 'required|string',
            'notes' => 'nullable|string',
            'is_donor' => 'boolean',
        ]);

        // Step 2: Validate donor info if donor
        if ($this->is_donor) {
            $this->validate([
                'donor_name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'address' => 'required|string',
                'donor_type' => 'required|string|in:individual,corporate,foundation,government',
                'logo' => 'nullable|image|max:1024',
            ]);
        }

        // Step 3: Generate a secure random payment reference
        $this->paymentReference = 'PSK_' . strtoupper(Str::random(16));

        // Step 4: Dispatch payment modal
        $this->dispatch('payOnline', data: [
            'amount' => $this->amount,
            'currency' => $this->currency,
            'email' => $this->email ?? config('services.paystack.merchant_email'),
            'reference' => $this->paymentReference,
        ]);
    }

    private function findOrCreateDonor()
    {
        return Donor::updateOrCreate(
            ['email' => $this->email],
            [
                'name' => $this->donor_name,
                'contact_person' => $this->contact_person ?? null,
                'phone' => $this->phone,
                'address' => $this->address,
                'donor_type' => $this->donor_type,
                'logo' => $this->logo ? $this->logo->store('logos', 'public') : null,
            ]
        );
    }

    public function verifyPayment($reference)
    {
        if (Donation::where('payment_reference', $reference)->exists()) {
            session()->flash('error', 'This transaction has already been processed.');
            return;
        }

        DB::beginTransaction();

        try {
            $response = Http::withToken(config('services.paystack.secret_key'))
                ->get("https://api.paystack.co/transaction/verify/{$reference}");

            if ($response->successful() && $response['data']['status'] === 'success') {
                $data = $response['data'];
                $donor = null;

                // Save transaction record
                PaystackTransaction::create([
                    'reference' => $data['reference'],
                    'status' => $data['status'],
                    'currency' => $data['currency'],
                    'amount' => $data['amount'] / 100, // Convert from pesewas to cedis
                    'customer_email' => $data['customer']['email'] ?? null,
                    'customer_phone' => $data['customer']['phone'] ?? null,
                    'gateway_response' => $data['gateway_response'] ?? null,
                    'channel' => $data['channel'] ?? null,
                    'bank' => $data['authorization']['bank'] ?? null,
                    'card_type' => $data['authorization']['card_type'] ?? null,
                    'payload' => $data, // Store full data for audit/debug
                ]);

                if ($this->is_donor) {
                    $donor = $this->findOrCreateDonor();
                }

                $donation = Donation::create([
                    'donor_id' => $donor?->id,
                    'amount' => $this->amount,
                    'currency' => $this->currency,
                    'donation_type' => $this->donation_type,
                    'item_description' => $this->item_description,
                    'donation_date' => now(),
                    'notes' => $this->notes,
                    'payment_reference' => $reference,
                ]);

                if ($this->is_donor && isset($donor)) {
                    // Send thank-you notification to donor
                    Notification::route('mail', $donor->email)
                        ->notify(new DonationThankYou(
                            donorName: $donor->name,
                            amount: $donation->amount,
                            currency: $donation->currency,
                            donationDate: $donation->donation_date->format('F j, Y'),
                            donationType: $donation->donation_type,
                            notes: $donation->notes
                        ));
                }

                DB::commit();

                $this->reset(); // Clear the form

                session()->flash('success', 'Donation recorded and payment verified successfully!');
            } else {
                session()->flash('error', 'Payment verification failed or was not successful.');
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Payment verification failed: ' . $e->getMessage());
            session()->flash('error', 'Something went wrong while verifying payment.');
        }
    }



    public function render()
    {
        return view('livewire.guest.donate');
    }
}
