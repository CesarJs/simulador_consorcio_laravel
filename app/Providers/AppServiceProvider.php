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
    }
}
