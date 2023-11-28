<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        if (\Config::get('app.env') == 'production') {

            URL::forceScheme('https');
            URL::forceRootUrl('https://www.parana-medio.com');
        } else {
            URL::forceScheme('http');
            URL::forceRootUrl('http://127.0.0.1/parana-medio');
        }
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