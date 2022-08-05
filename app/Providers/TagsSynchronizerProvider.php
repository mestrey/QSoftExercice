<?php

namespace App\Providers;

use App\Services\TagsSynchronizer;
use Illuminate\Support\ServiceProvider;

class TagsSynchronizerProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(TagsSynchronizer::class, TagsSynchronizer::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
