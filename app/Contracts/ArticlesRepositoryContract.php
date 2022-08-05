<?php

namespace App\Contracts;

interface ArticlesRepositoryContract
{
    public function getLatestPublishedArticles($count);
    public function getPaginatedArticles(int $page);
    public function getAllLatestPublishedArticles();
    public function deleteArticle($article);

    public function createArticle(array $data);
    public function updateArticle($article, array $data);
}
