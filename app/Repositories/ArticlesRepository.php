<?php

namespace App\Repositories;

use App\Contracts\ArticlesRepositoryContract;
use App\Models\Article;

class ArticlesRepository implements ArticlesRepositoryContract
{
    public function get(int $count = 0, int $page = 0)
    {
        $articles = Article::whereNotNull('published_at')
            ->latest('published_at');

        if ($count > 0) {
            $articles = $articles->take($count);
        }

        if ($page > 0) {
            $articles = $articles->paginate($page);
        } else {
            $articles = $articles->get();
        }

        return $articles;
    }

    public function create(array $data)
    {
        return Article::create($data);
    }

    public function update($article, array $data)
    {
        return $article->update($data);
    }

    public function delete($article)
    {
        $article->delete();
    }
}
