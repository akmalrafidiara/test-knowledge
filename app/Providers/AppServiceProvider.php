<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\StaffRepository;
use App\Repositories\StaffRepositoryInterface;
use App\Services\StaffService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(StaffRepositoryInterface::class, StaffRepository::class);
        $this->app->singleton(StaffService::class, function ($app) {
            return new StaffService($app->make(StaffRepositoryInterface::class));
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
