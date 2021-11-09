<?php

namespace App\Providers;

use App\MyLibraries\HelperClass\AppHelper;
use App\MyLibraries\HelperClass\ViewHelper;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\App;

class FacadeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        App::bind('viewhelper', function()
        {
            return new ViewHelper();
        });
        App::bind('apphelper', function()
        {
            return new AppHelper();
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
