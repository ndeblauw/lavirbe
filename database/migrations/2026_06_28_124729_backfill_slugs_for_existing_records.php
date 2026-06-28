<?php

use App\Models\Category;
use App\Models\Package;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    public function up(): void
    {
        foreach (Package::whereNull('slug')->cursor() as $package) {
            $package->generateSlug();
            $package->saveQuietly();
        }

        foreach (Category::whereNull('slug')->cursor() as $category) {
            $category->generateSlug();
            $category->saveQuietly();
        }
    }

    public function down(): void {}
};
