<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepoServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(
            'App\Http\Interfaces\homeinterface',
            'App\Http\Repositories\homerepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\AuthInterface',
            'App\Http\Repositories\AuthRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\AdminAuthInterface',
            'App\Http\Repositories\AdminAuthRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\AdminInterface',
            'App\Http\Repositories\AdminRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\TeamInterface',
            'App\Http\Repositories\TeamRepository'
        );
        $this->app->bind(
            'App\Http\Interfaces\PlanInterface',
            'App\Http\Repositories\PlanRepository'
        );
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
