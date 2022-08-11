<?php

namespace App\Services;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ImageRepositoryContract;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ArticleCreateService implements ArticleCreateServiceContract
{
    public function __construct(
        protected TagsSynchronizer $tagsSynchronizer,
        protected ImageRepositoryContract $imageRepository,
        protected ArticlesRepositoryContract $articlesRepository
    ) {
    }

    public function create(
        array $data,
        Collection $tagsCollection,
        $isPublished,
        UploadedFile $file
    ) {
        $path = $file->store('images', ['disk' => 'public']);

        $article = $this->articlesRepository->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'body' => $data['body'],
            'published_at' => $isPublished,
            'slug' => Str::slug($data['title']),
            'image_id' => $this->imageRepository->create(['path' => $path])->id
        ]);

        $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $article;
    }
}
