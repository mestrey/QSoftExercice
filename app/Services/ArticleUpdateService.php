<?php

namespace App\Services;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\ImageRepositoryContract;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class ArticleUpdateService implements ArticleUpdateServiceContract
{
    public function __construct(
        protected TagsSynchronizer $tagsSynchronizer,
        protected ImageRepositoryContract $imageRepository,
        protected ArticlesRepositoryContract $articlesRepository
    ) {
    }

    public function update(
        Article $article,
        array $data,
        Collection $tagsCollection,
        UploadedFile $file
    ) {
        $article->update($data);

        $path = $file->store('images', ['disk' => 'public']);
        $article->image()->associate($this->imageRepository->create([
            'path' => $path
        ]));
        $article->save();

        $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $article;
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

        return $article;
    }
}
