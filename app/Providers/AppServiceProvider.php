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
        view()->composer('dashboard.index', function ($view) {
            $view->with('active', 'dashboard');
        });

        view()->composer('billing.index', function ($view) {
            $view->with('active', 'billing');
        });

        view()->composer('webhooks.index', function ($view) {
            $view->with('active', 'webhooks');
        });

        view()->composer('api.index', function ($view) {
            $view->with('active', 'api');
        });

        view()->composer('settings.index', function ($view) {
            $view->with('active', 'settings');
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
