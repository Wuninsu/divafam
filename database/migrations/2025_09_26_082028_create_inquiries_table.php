<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inquiries', function (Blueprint $table) {
            $table->id();
            $table->string('name');                // sender's name
            $table->string('email')->nullable();   // sender's email
            $table->string('phone')->nullable();   // sender's phone
            $table->enum('type', ['inquiry', 'testimony', 'feedback']);
            $table->string('subject')->nullable(); // subject of the inquiry/feedback
            $table->string('position')->nullable(); // only for testimonies
            $table->string('image')->nullable();   // profile/testimony image
            $table->text('message');               // main body
            $table->boolean('status')->default(false); // pending/approved/resolved
            $table->boolean('responded')->default(false); // whether admin replied
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inquiries');
    }
};
