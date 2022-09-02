<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $city = fake()->city();
        return [
            'name' => $city . " Arena " . fake()->company(),
            'city' => $city,
            'street' => fake()->streetName(),
            'postcode' => fake()->postcode(),
            'country' => fake()->country(),
            'description' => fake()->paragraph(),
        ];
    }
}
