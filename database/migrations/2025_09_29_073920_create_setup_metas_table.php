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
        Schema::create('setup_metas', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();              
            $table->text('value')->nullable();

            // Optionally, specify if the value is an image, text, file, or JSON
            $table->enum('type', ['text', 'file', 'textarea', 'json'])->default('text');

            $table->string('section')->nullable();

            // Define the order of settings (for sliders, or section arrangements)
            $table->tinyInteger('order')->nullable()->default(0);

            // Status to enable/disable specific homepage sections or settings
            $table->boolean('status')->default(true);

            // Optional: Track the user who created/updated this setting (foreign key to users table)
            $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');

            // Optional: A description of what the setting is about
            $table->string('description')->nullable();

            // Add a 'link' column for each slider
            $table->string('link')->nullable();  

            $table->timestamps();

            // Indexing commonly queried fields for faster lookups
            $table->index(['section', 'status', 'order']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setup_metas');
    }
};
