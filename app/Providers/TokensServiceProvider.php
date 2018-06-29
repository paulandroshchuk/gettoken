<?php

namespace App\Providers;

use App\Actions\Gateways\Sms\SendSmsToken;
use Illuminate\Support\ServiceProvider;

class TokensServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('gateways.sms.send', function () {
            return new SendSmsToken();
        });
    }
}
