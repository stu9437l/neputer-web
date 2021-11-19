<?php

namespace Neputer\Providers;

use Illuminate\Support\ServiceProvider;

/**
 * Class HelperServiceProvider
 * @package Neputer\Providers
 */
class HelperServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        foreach (app('files')->files(base_path('neputer/Utils/helpers')) as $file) {
            require $file;
        }
    }

}
