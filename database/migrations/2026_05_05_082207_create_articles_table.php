<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug')->nullable()->unique();
            $table->text('content');
            $table->string('image_path')->nullable();
            $table->timestamp('published_at')->nullable();

            $table->foreignId('author_id')->nullable();
            $table->foreignId('category_id')->nullable();

            $table->timestamps();
        });
    }
};
