<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'category_id' => $this->faker->numberBetween(1, 2),
            'price' => $this->faker->randomFloat(2,10000, 100000),
            'description' => $this->faker->text(200),
            'image' => $this->faker->imageUrl(640, 480, 'food'),
            'is_active' => $this->faker->boolean(),
        ];
    }
}
