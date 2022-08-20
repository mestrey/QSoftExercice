<?php

namespace App\Providers;

use App\Contracts\SalonsClientRepositoryContract;
use App\Contracts\SalonsClientServiceContract;
use App\Repositories\SalonsClientRepository;
use App\Services\SalonsClientService;
use Illuminate\Support\ServiceProvider;

class SalonServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(SalonsClientRepositoryContract::class, SalonsClientRepository::class);
        $this->app->singleton(SalonsClientServiceContract::class, SalonsClientService::class);
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
