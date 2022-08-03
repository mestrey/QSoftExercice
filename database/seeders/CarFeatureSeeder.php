<?php

namespace Database\Seeders;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Seeder;

class CarFeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CarBody::factory()
            ->count(5)
            ->create();

        CarClass::factory()
            ->count(5)
            ->create();

        CarEngine::factory()
            ->count(5)
            ->create();
    }
}
