<?php

namespace App\Contracts;

use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

interface ArticlesRepositoryContract
{
    public function get(int $count): Collection;
    public function getPaginated(int $pageLength, int $pageNum): LengthAwarePaginator;
    public function delete(Article $article): void;
    public function create(array $data): Article;
    public function update(Article $article, array $data): bool;
    public function findBySlug(string $slug): Article;
    public function count(): int;
    public function getLongest(): Article;
    public function getShortest(): Article;
    public function getMostTagged(): Article;
}
