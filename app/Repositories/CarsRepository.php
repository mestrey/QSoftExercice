<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;

class CarsRepository implements CarsRepositoryContract
{
    public function getAllCars()
    {
        return Car::get();
    }

    public function getPaginatedCars(int $page)
    {
        return Car::paginate($page);
    }

    public function getAllFeaturedCars()
    {
        return Car::with('carEngine', 'carClass')->get();
    }

    public function getNewCars(int $count)
    {
        return Car::where('is_new', 0)
            ->take($count)
            ->get();
    }
}
