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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            // Model properties
            $table->string('title');
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->timestamp('published_at')->nullable();

            // Model relation properties
            $table->foreignId('author_id')->nullable();
            $table->foreignId('category_id')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
