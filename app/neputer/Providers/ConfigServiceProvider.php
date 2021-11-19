<?php

namespace Neputer\Providers;

use Symfony\Component\Finder\Finder;
use Illuminate\Support\ServiceProvider;

/**
 * Class ConfigServiceProvider
 * @package Neputer\Providers
 */
class ConfigServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $directory = __DIR__ . '/../config';

        foreach (Finder::create()->in($directory)->name('*.php') as $file)
        {
            $this->mergeConfigFrom(
                $file->getRealPath() , basename($file->getRealPath(), '.php') );
        }

    }

}
