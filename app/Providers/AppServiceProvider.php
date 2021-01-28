<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Cart;

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
        view()->composer(['app'], function($view){
            $view->with('cart_products', Cart::getContent()->sortByDesc('id'));
        });
    }
}
