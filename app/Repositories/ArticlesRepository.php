<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function get(int $count = 0): Collection
    {
        $articles = Article::whereNotNull('published_at')
            ->latest('published_at');

        if ($count > 0) {
            $articles = $articles->take($count)->get();
        } else {
            $articles = $articles->get();
        }

        return $articles;
    }

    public function getPaginated(int $page): LengthAwarePaginator
    {
        $articles = Article::whereNotNull('published_at')
            ->latest('published_at');

        $articles = $articles->paginate($page);

        return $articles;
    }

    public function create(array $data): Article
    {
        return Article::create($data);
    }

    public function update(Article $article, array $data): bool
    {
        return $article->update($data);
    }

    public function delete(Article $article): void
    {
        $article->delete();
    }

    public function findBySlug(string $slug): Article
    {
        return Article::where('slug', $slug)
            ->firstOrFail();
    }
}
