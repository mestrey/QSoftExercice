<?php

namespace App\Services;

use App\Interfaces\HasTags;
use App\Models\Tag;
use Illuminate\Support\Collection;

class TagsSynchronizer
{
    public function sync(Collection $tags, HasTags $model)
    {
        $model->tags()->detach();
        $tags->each(function (string $tagName) use ($model) {
            $tag = Tag::firstOrCreate([
                'name' => $tagName
            ]);

            $model->tags()->attach($tag->id);
        });
    }
}
