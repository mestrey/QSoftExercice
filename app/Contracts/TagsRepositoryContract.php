<?php

namespace App\Contracts;

interface TagsRepositoryContract
{
    public function firstOrCreate(string $name);
}
