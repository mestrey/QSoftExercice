<?php

namespace App\Services;

use App\Repositories\ArticlesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\TagsRepository;

class AppStatisticsService
{
    public function getStats()
    {
        $carRepository = new CarsRepository;
        $articleRepository = new ArticlesRepository;
        $tagRepository = new TagsRepository;

        return [
            'cars' => $carRepository->count(),
            'articles' => $articleRepository->count(),
            'mostUsedTag' => $tagRepository->getMostUsed(),
            'longestArticle' => $articleRepository->getLongest(),
            'shortestArticle' => $articleRepository->getShortest(),
            'averageArticlePerTag' => $tagRepository->averageArticle(),
            'mostTaggedArticle' => $articleRepository->getMostTagged(),
        ];
    }
}
