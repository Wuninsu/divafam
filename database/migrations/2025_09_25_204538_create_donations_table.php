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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('donor_id')->nullable()->constrained()->onDelete('cascade');
            $table->string('payment_reference')->unique()->nullable();
            $table->string('status')->default('pending');
            $table->decimal('amount', 12, 2)->nullable(); // Cash donations
            $table->string('currency')->default('GHS');
            $table->string('donation_type')->default('cash'); // cash, in-kind, sponsorship
            $table->string('item_description')->nullable(); // For in-kind
            $table->date('donation_date');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
