<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;

class CarsRepository implements CarsRepositoryContract
{
    public function get()
    {
        return Car::get();
    }

    public function getPaginated(int $page)
    {
        return Car::paginate($page);
    }

    public function getFeatured()
    {
        return Car::with('carEngine', 'carClass')->get();
    }

    public function getNew(int $count)
    {
        return Car::where('is_new', 0)
            ->take($count)
            ->get();
    }
}
