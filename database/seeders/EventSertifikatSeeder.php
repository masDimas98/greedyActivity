<?php

namespace Database\Seeders;

use App\Models\EventSertifikatModel;
use Illuminate\Database\Seeder;

class EventSertifikatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EventSertifikatModel::factory(5)->create();
    }
}
