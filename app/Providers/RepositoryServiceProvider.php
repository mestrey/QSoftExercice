<?php

namespace App\Providers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\TagsRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->bind(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->bind(TagsRepositoryContract::class, TagsRepository::class);
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
