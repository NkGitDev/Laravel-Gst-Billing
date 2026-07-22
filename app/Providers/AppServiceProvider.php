<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\URL;


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
        // Live server (production) par hamesha HTTPS force karne ke liye
        if (config('app.env') === 'production') {
            URL::forceScheme('https');
        }

        // Share the authenticated user with all views
        View::composer('*', function ($view) {
            $view->with('user', Auth::user());
        });


        Paginator::useBootstrapFive();
    }
}
