<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Category;
use App\Models\Customer;
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
        Customer::factory(10)->create();

        // Add 20 likes between users and articles
        for ($counter = 0; $counter < 20; $counter++) {
            $user = User::find(rand(1, 10));
            $article = Article::find(rand(1, 20));

            $user->likes()->attach($article->id);
        }
    }
}
