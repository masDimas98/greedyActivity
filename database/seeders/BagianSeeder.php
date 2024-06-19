<?php

namespace Database\Seeders;

use App\Models\BagianModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BagianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BagianModel::factory(50)->create();
    }
}
