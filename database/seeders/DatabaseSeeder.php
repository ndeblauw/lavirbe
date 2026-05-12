<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Faq;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Nico Deblauwe',
            'email' => 'nico@deblauwe.be',
            'password' => '$2y$12$jIh.B2y9M63ecBCwINHt7eJF/ljMoTb/SHcFiJtvDNVCWskfrNQwm',
            'is_admin' => true,
        ]);

        User::factory(10)->create();
        Category::factory(4)->create();
        Faq::factory(10)->create();
        Article::factory(20)->create();
    }
}
