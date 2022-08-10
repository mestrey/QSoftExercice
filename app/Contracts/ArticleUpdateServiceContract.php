<?php

namespace App\Contracts;

use App\Models\Article;
use App\Services\TagsSynchronizer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ArticleUpdateServiceContract
{
    public function __construct(
        TagsSynchronizer $tagsSynchronizer,
        ImageRepositoryContract $imageRepository,
        ArticlesRepositoryContract $articlesRepository
    );

    public function update(
        Article $article,
        array $data,
        Collection $tagsCollection,
        UploadedFile $file
    );

    public function create(
        array $data,
        Collection $tagsCollection,
        $isPublished,
        UploadedFile $file
    );
}
