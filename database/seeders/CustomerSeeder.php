<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CustomerSeeder extends Seeder
{
    public function run(): void
    {
        $seedDir = storage_path('seeds/customers');

        if (! is_dir($seedDir)) {
            return;
        }

        $files = File::files($seedDir);

        foreach ($files as $file) {
            $name = pathinfo($file->getFilename(), PATHINFO_FILENAME);
            $name = str_replace('-', ' ', $name);

            $customer = Customer::create([
                'name' => $name,
                'hidden' => false,
            ]);

            $customer->addMedia($file->getRealPath())
                ->preservingOriginal()
                ->toMediaCollection('logo');
        }
    }
}
