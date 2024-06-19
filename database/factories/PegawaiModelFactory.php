<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PegawaiModel>
 */
class PegawaiModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nip' => fake()->numberBetween(100000000000000, 999999999999999),
            'ktp' => fake()->numberBetween(1000000000000000, 9999999999999999),
            'namaPegawai' => fake()->name(),
            'namaPanggilan' => fake()->firstNameMale(),
            'bagian' => fake()->numberBetween(1, 10),
            'posisiSekarang' => fake()->randomElement(['Manager', 'Leader', 'Staff']),
            'tempatLahir' => fake()->city(),
            'tanggalLahir' => fake()->date(),
            'agamaKepercayaan' => fake()->randomElement(['islam', 'kristen', 'katolik', 'hindu', 'buddha', 'khonghucu'])
        ];
    }
}
