<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function getLatestPublishedArticles($count)
    {
        return Article::whereNotNull('published_at')
            ->latest('published_at')
            ->take($count)
            ->get();
    }

    public function getPaginatedArticles(int $page)
    {
        return Article::whereNotNull('published_at')
            ->latest('published_at')
            ->paginate($page);
    }

    public function getAllLatestPublishedArticles()
    {
        return Article::whereNotNull('published_at')
            ->latest('published_at')
            ->get();
    }

    public function createArticle(array $data)
    {
        return Article::create($data);
    }

    public function updateArticle($article, array $data)
    {
        return $article->update($data);
    }

    public function deleteArticle($article)
    {
        $article->delete();
    }
}
