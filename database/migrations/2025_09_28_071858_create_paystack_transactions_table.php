<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paystack_transactions', function (Blueprint $table) {
            $table->id();

            // Core transaction details
            $table->string('reference')->unique();
            $table->string('status');
            $table->string('currency', 10);
            $table->decimal('amount', 15, 2); // Stored in major units (e.g. NGN not kobo)

            // Customer info
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();

            // Gateway response / bank info
            $table->string('gateway_response')->nullable();
            $table->string('channel')->nullable();
            $table->string('bank')->nullable();
            $table->string('card_type')->nullable()->nullable();

            // Full raw payload
            $table->json('payload')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paystack_transactions');
    }
};
