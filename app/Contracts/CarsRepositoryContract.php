<?php

namespace App\Contracts;

use App\Models\Car;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface CarsRepositoryContract
{
    public function get(): Collection;
    public function getPaginated(int $page): LengthAwarePaginator;
    public function getFeatured(): Collection;
    public function getNew(int $count): Collection;
    public function findById(int $id): Car;
}
