<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function get(int $count): Collection
    {
        return Cache::remember('latest_articles', 3600, function () use ($count) {
            return Article::whereNotNull('published_at')
                ->latest('published_at')
                ->take($count)
                ->get();
        });
    }

    public function getPaginated(int $page): LengthAwarePaginator
    {
        return Cache::remember('paginated_articles', 3600, function () use ($page) {
            return Article::whereNotNull('published_at')
                ->latest('published_at')
                ->paginate($page);
        });
    }

    public function create(array $data): Article
    {
        return Cache::remember(str_replace('\\', '_', Article::class) . '_' . $data['slug'], 3600, function () use ($data) {
            return Article::create($data);
        });
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
        return Cache::remember(str_replace('\\', '_', Article::class) . '_' . $slug, 3600, function () use ($slug) {
            return Article::where('slug', $slug)
                ->firstOrFail();
        });
    }
}
