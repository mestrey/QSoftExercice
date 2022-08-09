<?php

namespace App\Contracts;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract
{
    public function get(int $count = 0): Collection;
    public function getPaginated(int $page): LengthAwarePaginator;
    public function delete(Article $article): void;
    public function create(array $data): Article;
    public function update(Article $article, array $data): bool;
    public function findBySlug(string $slug): Article;
}
