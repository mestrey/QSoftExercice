<?php

namespace App\Providers;

use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoryRepository;
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
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(CategoryRepositoryContract::class, CategoryRepository::class);
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
