<?php

namespace App\Repositories;

use App\Contracts\TagsRepositoryContract;
use App\Models\Tag;
use Illuminate\Support\Facades\Cache;

class TagsRepository implements TagsRepositoryContract
{
    public function firstOrCreate(string $name)
    {
        return Cache::remember('tag_' . $name, 3600, function () use ($name) {
            return Tag::firstOrCreate([
                'name' => $name
            ]);
        });
    }
}
