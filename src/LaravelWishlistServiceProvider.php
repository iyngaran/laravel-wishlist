<?php

namespace Iyngaran\LaravelWishlist;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Iyngaran\LaravelWishlist\Repositories\WishlistRepository;
use Iyngaran\LaravelWishlist\Repositories\WishlistRepositoryInterface;

class LaravelWishlistServiceProvider extends ServiceProvider
{
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/config.php' => config_path('iyngaran.wishlist.php'),
            ], 'wishlist-config');
        }

        $this->registerResources();
    }

    public function register()
    {
        // Automatically apply the package configuration
        $this->mergeConfigFrom(__DIR__.'/../config/config.php', 'iyngaran.wishlist');

        // Register the main class to use with the facade
        $this->app->singleton('laravel-wishlist', function () {
            return new LaravelWishlist;
        });

        $this->registerRepositories();
    }


    private function registerResources()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        $this->loadFactoriesFrom(__DIR__ . '/../database/factories');

        $this->registerWebRoutes();
        $this->registerApiRoutes();
    }

    private function registerWebRoutes()
    {
        Route::group(
            $this->webRouteConfiguration(),
            function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
            }
        );
    }

    private function registerApiRoutes()
    {
        Route::group(
            $this->apiRouteConfiguration(),
            function () {
                $this->loadRoutesFrom(__DIR__ . '/../routes/api.php');
            }
        );
    }

    private function webRouteConfiguration()
    {
        return  [
            'prefix' => "/",
            'middleware' => "web",
            'namespace' => 'Iyngaran\LaravelUser\Http\Controllers'
        ];
    }

    private function apiRouteConfiguration()
    {
        return  [
            'prefix' => 'api/',
            'middleware' => "api",
            'namespace' => 'Iyngaran\LaravelUser\Http\Controllers\Api'

        ];
    }

    private function registerRepositories()
    {
        $this->app->bind(WishlistRepositoryInterface::class, WishlistRepository::class);
    }
}
