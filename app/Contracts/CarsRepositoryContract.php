<?php

namespace App\Contracts;

use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function get(): Collection;
    public function getPaginated(int $pageLength, int $pageNum): LengthAwarePaginator;
    public function getFeatured(): Collection;
    public function getNew(int $count): Collection;
    public function findById(int $id): Car;
    public function getByCategory(int $categoryId): Collection;
    public function getByCategoryPaginated(int $categoryId, int $pageLength, int $pageNum): LengthAwarePaginator;
    public function count(): int;
}
