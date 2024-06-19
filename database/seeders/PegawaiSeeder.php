<?php

namespace Database\Seeders;

use App\Models\PegawaiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PegawaiModel::factory(100)->create();
    }
}
