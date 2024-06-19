<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EventModel>
 */
class EventModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $start = fake()->unique()->dateTimeBetween('next Monday', 'next Monday +7 days')->format('Y-m-d');
        return [
            'namaEvent' => fake()->firstName(),
            'jumlahOrang' => fake()->numberBetween(1, 15),
            'tanggalMulai' => $start,
            'tanggalSelesai' => fake()->unique()->dateTimeBetween($start, '+30 Days',  null)->format('Y-m-d'),
            'status' => fake()->randomElement(['open'])
        ];
    }
}
