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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->unique();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete(); // creator/owner
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->string('title')->nullable();
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('cover_image')->nullable();

            // 🔹 Project-specific fields
            $table->enum('status', ['draft', 'ongoing', 'completed', 'archived', 'postponed'])->default('draft');
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('location')->nullable();
            $table->decimal('budget', 15, 2)->nullable();
            $table->decimal('amount_spent', 15, 2)->nullable();

            // 🔹 Visibility and SEO
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->json('tags')->nullable(); // quick tagging if you don’t want pivot

            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('project_leads', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->unique(['project_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_lead');
        Schema::dropIfExists('projects');
    }
};
