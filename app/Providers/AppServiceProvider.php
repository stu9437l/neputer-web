<?php

namespace App\Providers;

use Illuminate\Routing\UrlGenerator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * @param UrlGenerator $urlGenerator
     */
    public function boot(UrlGenerator $urlGenerator)
    {
        if (app()->environment() === 'production') {
            $urlGenerator->forceScheme('https');
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
