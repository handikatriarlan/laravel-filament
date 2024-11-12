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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
    $table->string('title');
    $table->string('slug');
    $table->longText('body');
    $table->foreignId('author_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('category_id')->nullable()->constrained('categories')->onDelete('set null');
    $table->enum('status', ['draft', 'published'])->default('draft');
    $table->string('thumbnail')->nullable();
    $table->timestamps();
    $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
