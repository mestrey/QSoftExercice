<?php

namespace App\Providers;

use App\Contracts\BannerRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\ImageRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Repositories\BannerRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImageRepository;
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
        $this->app->singleton(CarsRepositoryContract::class, CarsRepository::class);
        $this->app->singleton(TagsRepositoryContract::class, TagsRepository::class);
        $this->app->singleton(CategoryRepositoryContract::class, CategoryRepository::class);
        $this->app->singleton(ImageRepositoryContract::class, ImageRepository::class);
        $this->app->singleton(BannerRepositoryContract::class, BannerRepository::class);
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
