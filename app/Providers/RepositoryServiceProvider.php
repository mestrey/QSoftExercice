<?php

namespace App\Providers;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Contracts\BannerRepositoryContract;
use App\Contracts\CarsRepositoryContract;
use App\Contracts\CategoryRepositoryContract;
use App\Contracts\ImageRepositoryContract;
use App\Contracts\TagsRepositoryContract;
use App\Repositories\ArticlesRepository;
use App\Repositories\BannerRepository;
use App\Repositories\CarsRepository;
use App\Repositories\CategoryRepository;
use App\Repositories\ImageRepository;
use App\Repositories\TagsRepository;
use App\Services\ArticleCreateService;
use App\Services\ArticleUpdateService;
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
        $this->app->singleton(ImageRepositoryContract::class, ImageRepository::class);

        $this->app->singleton(ArticleUpdateServiceContract::class, ArticleUpdateService::class);
        $this->app->singleton(ArticleCreateServiceContract::class, ArticleCreateService::class);
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
