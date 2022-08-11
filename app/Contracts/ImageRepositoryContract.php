<?php

namespace App\Contracts;

use App\Models\Image;

interface ImageRepositoryContract
{
    public function create(array $data): Image;
}
