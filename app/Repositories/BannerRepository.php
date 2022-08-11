<?php

namespace App\Repositories;

use App\Contracts\BannerRepositoryContract;
use App\Models\Banner;
use Illuminate\Support\Facades\Cache;

class BannerRepository implements BannerRepositoryContract
{
    public function getRandom(int $count)
    {
        return Cache::remember('banners_cache', 3600, function () use ($count) {
            return Banner::inRandomOrder()
                ->limit($count)
                ->get();
        });
    }
}
