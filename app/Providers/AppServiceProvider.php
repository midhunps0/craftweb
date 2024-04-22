<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // \Illuminate\Support\Facades\View::composer('*', function (View $view) {
        //     $uri = $this->app->request->getRequestUri();
        //     info('current uri: ' . $uri);
        // });
    }
}
