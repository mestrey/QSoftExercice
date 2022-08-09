<?php

namespace App\Services;

use App\Contracts\TagsRepositoryContract;
use App\Interfaces\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function __construct(
        protected TagsRepositoryContract $tagsRepository
    ) {
    }

    public function sync(Collection $tags, HasTags $model)
    {
        $model->tags()->detach();
        $tags->each(function (string $tagName) use ($model) {
            $tag = $this->tagsRepository->firstOrCreate($tagName);
            $model->tags()->attach($tag->id);
        });
    }
}
