<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(
            'App\Repositories\CarRepository',
            'App\Repositories\CarRepositoryEloquent'
            );
        $this->app->bind(
            'App\Repositories\CategoryRepository',
            'App\Repositories\CategoryRepositoryEloquent'
            );
        $this->app->bind(
            'App\Repositories\ProviderRepository',
            'App\Repositories\ProviderRepositoryEloquent'
            );
        $this->app->bind(
            'App\Repositories\PlanRepository',
            'App\Repositories\PlanRepositoryEloquent'
            );
        $this->app->bind(
            'App\Repositories\ThemeRepository',
            'App\Repositories\ThemeRepositoryEloquent'
            );
        $this->app->bind(
            'App\Repositories\ProductRepository',
            'App\Repositories\ProductRepositoryEloquent'
            );
    }
}
