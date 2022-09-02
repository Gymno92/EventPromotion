<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->sentence() . " - " . fake()->emoji(),
            'date' => fake()->date('Y-m-d'),
            'location_id' => rand(1, 10),
            'performer_id' => rand(1, 10),
            'description' => fake()->paragraph(),
            'price' => fake()->randomNumber()
        ];
    }
}
