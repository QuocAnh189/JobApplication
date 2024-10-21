<?php

namespace Src\Common\Application\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     *
     * @return void
     */
    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('web')
                ->group(base_path('routes/web.php'));


            Route::middleware('api')
                ->prefix('auth')
                ->group(base_path('src/Auth/Presentation/HTTP/Routes/routes.php'));

            Route::middleware('api')
                ->prefix('employer')
                ->group(base_path('src/Employer/Presentation/HTTP/Routes/routes.php'));

            Route::middleware('api')
                ->group(base_path('src/Job/Presentation/HTTP/Routes/routes.php'));

            Route::middleware('api')
                ->group(base_path('src/JobApplication/Presentation/HTTP/Routes/routes.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     *
     * @return void
     */
    protected function configureRateLimiting()
    {
        RateLimiter::for('internal_api', function (Request $request) {
            return Limit::perMinute(60)->by($request->ip());
        });
    }
}
