<?php

namespace Database\Factories;

use App\Models\Package;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Package>
 */
class PackageFactory extends Factory
{
    public function definition(): array
    {
        $title = $this->faker->sentence(3);

        return [
            'title' => $title,
            'body' => $this->faker->paragraphs(3, true),
            'slug' => Str::slug($title),
            'hidden' => $this->faker->boolean(20),
        ];
    }
}
