<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        // Categories Table
        Schema::create('categories', function (Blueprint $table): void {
            $table->id();
            $table->foreignId('parent_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('name');
            $table->string('slug')->unique();
            $table->boolean('status')->default(true)->comment('0: inactive, 1: active');
            $table->timestamps();
        });

        // Posts Table
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable()->constrained('categories')->cascadeOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary')->nullable();
            $table->longText('content');
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->boolean('is_approved')->default(false);
            $table->boolean('is_active')->default(true);
            $table->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();
            $table->softDeletes();
            $table->timestamps();
        });

        // Tags Table
        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
        });

        // Post ↔ Tag Pivot
        Schema::create('post_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->onDelete('cascade');
            $table->foreignId('tag_id')->constrained()->onDelete('cascade');
            $table->unique(['post_id', 'tag_id']);
            $table->timestamps();
        });

        // Comments Table
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('post_id')->constrained()->cascadeOnDelete();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->longText('body');
            $table->foreignId('parent_id')->nullable()->constrained('comments')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('comments');
        Schema::dropIfExists('post_tags');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('posts');
        Schema::dropIfExists('categories');
    }
};
