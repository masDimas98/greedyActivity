<?php

namespace Database\Seeders;

use App\Models\SertifikatModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SertifikatModel::factory(3)->create();
    }
}
