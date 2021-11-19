<?php

namespace Neputer\Utils\Generator\Providers;

use Illuminate\Support\ServiceProvider;
use Neputer\Utils\Generator\Console\GenerateModuleCommand;

/**
 * Class GeneratorServiceProvider
 * @package Neputer\Utils\Generator\Providers
 */
class GeneratorServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->commands([
            GenerateModuleCommand::class,
        ]);

        $this->mergeConfigFrom(
            __DIR__.'/../config/generator.php', 'generator'
        );
    }

}
