<?php

namespace App\Contracts;

use App\Models\Tag;

interface TagsRepositoryContract
{
    public function firstOrCreate(string $name);
    public function getMostUsed(): Tag;
    public function averageArticle(): float;
}
