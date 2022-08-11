<?php

namespace App\Repositories;

use App\Contracts\CategoryRepositoryContract;
use App\Models\Category;
use Illuminate\Support\Collection;

class CategoryRepository implements CategoryRepositoryContract
{
    public function getRoots(): Collection
    {
        return Category::where('parent_id', NULL)->orderBy('sort')->get();
    }

    public function getChildren(Category $cat): Collection
    {
        return $cat->children->sortBy('sort');
    }

    public function findBySlug(string $slug)
    {
        return Category::where('slug', $slug)
            ->firstOrFail();
    }
}
