<?php

namespace App\Providers;

use App\Contracts\ArticleCreateServiceContract;
use App\Contracts\ArticlesRepositoryContract;
use App\Contracts\ArticleUpdateServiceContract;
use App\Repositories\ArticlesRepository;
use App\Services\ArticleCreateService;
use App\Services\ArticleUpdateService;
use Illuminate\Support\ServiceProvider;

class ArticleServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ArticlesRepositoryContract::class, ArticlesRepository::class);
        $this->app->singleton(ArticleUpdateServiceContract::class, ArticleUpdateService::class);
        $this->app->singleton(ArticleCreateServiceContract::class, ArticleCreateService::class);
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
