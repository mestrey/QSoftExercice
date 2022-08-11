<?php

namespace App\Repositories;

use App\Contracts\ImageRepositoryContract;
use App\Models\Image;

class ImageRepository implements ImageRepositoryContract
{
    public function create(array $data): Image
    {
        return Image::factory()->create($data);
    }
}
