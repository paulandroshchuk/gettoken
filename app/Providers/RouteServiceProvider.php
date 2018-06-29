<?php

namespace App\Providers;

use App\Exceptions\InvalidTokenException;
use App\Models\Gateway;
use App\Models\Token;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Session;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        Route::bind('tokenGateway', function ($value) {
            return Gateway::where('name', $value)->first() ?? abort(404);
        });

        Route::bind('someToken', function ($value) {
            $token = Token::where('token', $value)->first();

            if ($token === null) {
                throw new InvalidTokenException('The provided token is invalid.');
            }

            return $token;
        });

        RedirectResponse::macro('withSuccess', function ($message) {
            Session::flash('success', $message);

            return $this;
        });

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api/v1')
             ->middleware('api')
             ->namespace($this->namespace . '\\Api')
             ->name('api')
             ->group(base_path('routes/api.php'));
    }
}
