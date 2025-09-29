<?php

namespace App\Providers;

use Binkode\Paystack\Facades\Paystack;
use Illuminate\Support\ServiceProvider;

class PaystackService extends ServiceProvider
{  /**
   * Initialize the payment and return the authorization URL
   *
   * @param int $amount
   * @param string $email
   * @return array
   */
    public function initializePayment($amount, $email)
    {
        return Paystack::getAuthorizationUrl([
            'amount' => $amount * 100,  // Paystack expects the amount in kobo (100 Kobo = 1 Naira)
            'email' => $email,
            'callback_url' => env('PAYSTACK_CALLBACK_URL'),
        ]);
    }

    /**
     * Verify payment after callback
     *
     * @param string $reference
     * @return array
     */
    public function verifyPayment($reference)
    {
        return Paystack::verifyTransaction($reference);
    }
}
