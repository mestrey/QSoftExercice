<?php

namespace Database\Factories;

use App\Models\CarBody;
use App\Models\CarClass;
use App\Models\CarEngine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->faker->addProvider(new \Faker\Provider\Fakecar($this->faker));

        return [
            'name' => $this->faker->vehicle,
            'body' => $this->faker->realText(50),
            'price' => $this->faker->numberBetween(1000000, 3000000),
            'old_price' => $this->faker->numberBetween(3000000, 5000000),
            'salon' => $this->faker->vehicleType(),
            'car_class_id' => $this->faker->numberBetween(1, CarClass::count()),
            'kpp' => $this->faker->vehicleGearBoxType,
            'year' => $this->faker->numberBetween(1998, 2017),
            'color' => $this->faker->colorName(),
            'car_body_id' => $this->faker->numberBetween(1, CarBody::count()),
            'car_engine_id' => $this->faker->numberBetween(1, CarEngine::count()),
            'is_new' => $this->faker->boolean(),
        ];
    }
}
