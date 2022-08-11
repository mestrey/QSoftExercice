<?php

namespace App\Services;

use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\ImageRepositoryContract;
use App\Models\Article;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class ArticleUpdateService implements ArticleUpdateServiceContract
{
    public function __construct(
        protected TagsSynchronizer $tagsSynchronizer,
        protected ImageRepositoryContract $imageRepository
    ) {
    }

    public function update(
        Article $article,
        array $data,
        Collection $tagsCollection,
        UploadedFile $file
    ) {
        DB::transaction(function () use ($article, $data, $file) {
            $article->update($data);

            $path = $file->store('images', ['disk' => 'public']);
            $article->image()->associate($this->imageRepository->create([
                'path' => $path
            ]));
            $article->save();
        });

        $this->tagsSynchronizer->sync($tagsCollection, $article);

        return $article;
    }
}
