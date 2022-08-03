<?php

namespace Database\Seeders;

use App\Models\Car;
use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $engines = CarEngine::get();
        $classes = CarClass::get();
        $bodies = CarBody::get();

        Car::factory()
            ->count(20)
            ->state(fn () => [
                'car_engine_id' => $engines->random(),
                'car_class_id' => $classes->random(),
                'car_body_id' => $bodies->random()
            ])
            ->create();
    }
}
