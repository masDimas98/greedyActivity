<?php

namespace Database\Seeders;

use App\Models\SertifikasiModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SertifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SertifikasiModel::factory(5)->create();
    }
}
