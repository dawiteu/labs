<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap(); 
        // blade @Admin @endAdmin 
        Blade::if('Admin', function () {
            return Auth::user()->role_id == 1;
        });

        Blade::if('Webmaster', function () {
            return Auth::user()->role_id == 1 || Auth::user()->role_id == 2;
        });

        Blade::if('Redacteur', function () {
            return Auth::user()->role_id == 1 || Auth::user()->role_id == 2 || Auth::user()->role_id == 3;
        });
    }
}
