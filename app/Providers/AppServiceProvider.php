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
        if (app()->environment() === 'production' || env('ENFORCE_HTTPS')) {
            $urlGenerator->forceScheme('https');
        }

        if ($this->app->environment(['staging', 'production'])) {
            $this->app->register(\Rollbar\Laravel\RollbarServiceProvider::class);
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
