<?php

namespace App\Contracts;

use App\Interfaces\HasTags;
use Illuminate\Support\Collection;

interface TagsRepositoryContract
{
    public function sync(Collection $tags, HasTags $model);
}
