<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    public const HOME = '/';
    protected $namespace = 'App\Http\Controllers';
    protected $admin_namespace = 'App\Http\Controllers\Admin';
    protected $user_namespace = 'App\Http\Controllers\User';
    protected $app_namespace = 'App\Http\Controllers\MobileApp';
    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by(optional($request->user())->id ?: $request->ip());
        });
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
        Route::middleware('web')->namespace($this->admin_namespace)
            ->prefix('admin')
            ->group(base_path('routes/admin.php'));
        Route::prefix('user')
            ->middleware('web')
            ->namespace($this->user_namespace)
            ->group(base_path('routes/user.php'));
        Route::middleware('api')->namespace($this->app_namespace)
            ->prefix('api')
            ->group(base_path('routes/api.php'));
    }
}
