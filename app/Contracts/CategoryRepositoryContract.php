<?php

namespace App\Contracts;

use App\Models\Category;
use Illuminate\Support\Collection;

interface CategoryRepositoryContract
{
    public function getRoots(): Collection;
    public function getChildren(Category $cat): Collection;
    public function findBySlug(string $slug);
}
