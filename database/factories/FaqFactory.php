<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Faq>
 */
class FaqFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'question' => $this->faker->sentence(),
            'answer' => $this->faker->paragraphs(3, true),
            'category_id' => $this->faker->numberBetween(1, 4),
            'user_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
