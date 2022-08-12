<?php

namespace App\Traits;

use Illuminate\Support\Facades\Cache;

trait CacheableTrait
{
    public static function bootCacheableTrait()
    {
        static::updated(function ($item) {
            $key = str_replace('\\', '_', get_class($item)) . '_' . ($item->getRouteKeyName() == 'slug' ? $item->slug : $item->id);
            Cache::forget($key);
        });

        static::deleted(function ($item) {
            $key = str_replace('\\', '_', get_class($item)) . '_' . ($item->getRouteKeyName() == 'slug' ? $item->slug : $item->id);
            Cache::forget($key);
        });
    }
}
