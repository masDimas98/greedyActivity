<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SertifikatModel>
 */
class SertifikatModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'namaSertifikat' => fake()->name(),
            'tanggalKeluaran' => fake()->date(),
            'lamaSertifikat' => fake()->numberBetween(1, 5),
            'levelSertifikat' => fake()->numberBetween(1, 5)
        ];
    }
}
