<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class CarsRepository implements CarsRepositoryContract
{
    public function get(): Collection
    {
        return Car::get();
    }

    public function getPaginated(int $page): LengthAwarePaginator
    {
        return Car::paginate($page);
    }

    public function getFeatured(): Collection
    {
        return Car::with('carEngine', 'carClass')->get();
    }

    public function getNew(int $count): Collection
    {
        return Car::where('is_new', 0)
            ->take($count)
            ->get();
    }

    public function findById(int $id): Car
    {
        return Car::where('id', $id)
            ->firstOrFail();
    }
}
