<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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

        User::create([
            'name' => 'Ailan Iriks',
            'email' => 'info@lavir.be',
            'password' => Hash::make('tijnisfijn'),
            'is_admin' => true,
        ]);

        $this->call(ArticleSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(FormationSeeder::class);
    }
}
