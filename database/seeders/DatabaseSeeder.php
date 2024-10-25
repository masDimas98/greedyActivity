<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            // BagianSeeder::class,
            // EventSeeder::class,
            // SertifikatSeeder::class,
            UserSeeder::class,
            // PegawaiSeeder::class,
            // SertifikasiSeeder::class,
            // EventSertifikatSeeder::class
        ]);
    }
}
