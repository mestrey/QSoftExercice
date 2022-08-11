<?php

namespace App\Repositories;

use App\Contracts\BannerRepositoryContract;
use App\Models\Banner;

class BannerRepository implements BannerRepositoryContract
{
    public function getRandom(int $count)
    {
        return Banner::inRandomOrder()
            ->limit($count)
            ->get();
    }
}
