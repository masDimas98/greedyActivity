<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventSertifikatModel>
 */
class EventSertifikatModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'idEvent' => fake()->numberBetween(1, 10),
            'idSertifikat' => fake()->numberBetween(1, 3),
        ];
    }
}
