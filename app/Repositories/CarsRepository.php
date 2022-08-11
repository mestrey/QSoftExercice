<?php

namespace App\Repositories;

use App\Contracts\CarsRepositoryContract;
use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CarsRepository implements CarsRepositoryContract
{
    public function get(): Collection
    {
        return Cache::remember('cars', 3600, function () {
            return Car::get();
        });
    }

    public function getPaginated(int $page): LengthAwarePaginator
    {
        return Cache::remember('paginated_cars', 3600, function () use ($page) {
            return Car::paginate($page);
        });
    }

    public function getFeatured(): Collection
    {
        return Cache::remember('featured_cars', 3600, function () {
            return Car::with('carEngine', 'carClass')->get();
        });
    }

    public function getNew(int $count): Collection
    {
        return Cache::remember('new_cars', 3600, function () use ($count) {
            return Car::where('is_new', 0)
                ->take($count)
                ->get();
        });
    }

    public function findById(int $id): Car
    {
        return Cache::remember(str_replace('\\', '_', Car::class) . '_' . $id, 3600, function () use ($id) {
            return Car::where('id', $id)
                ->firstOrFail();
        });
    }

    public function getByCategory(int $categoryId): Collection
    {
        return Cache::remember('cars_category_' . $categoryId, 3600, function () use ($categoryId) {
            return Car::where('category_id', $categoryId)
                ->get();
        });
    }

    public function getByCategoryPaginated(int $categoryId, int $page): LengthAwarePaginator
    {
        return Cache::remember('paginated_cars_category_' . $categoryId, 3600, function () use ($categoryId, $page) {
            return Car::where('category_id', $categoryId)
                ->paginate($page);
        });
    }
}
