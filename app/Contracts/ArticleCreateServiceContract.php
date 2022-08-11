<?php

namespace App\Contracts;

use App\Services\TagsSynchronizer;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;

interface ArticleCreateServiceContract
{
    public function __construct(
        TagsSynchronizer $tagsSynchronizer,
        ImageRepositoryContract $imageRepository,
        ArticlesRepositoryContract $articlesRepository
    );

    public function create(
        array $data,
        Collection $tagsCollection,
        $isPublished,
        UploadedFile $file
    );
}
