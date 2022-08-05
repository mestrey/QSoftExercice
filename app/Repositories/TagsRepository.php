<?php

namespace App\Repositories;

use App\Contracts\TagsRepositoryContract;
use App\Models\Tag;

class TagsRepository implements TagsRepositoryContract
{
    public function firstOrCreate(string $name)
    {
        return Tag::firstOrCreate([
            'name' => $name
        ]);
    }
}
