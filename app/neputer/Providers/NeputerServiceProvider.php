<?php

namespace Neputer\Providers;

use Neputer\Utils\Acl\Providers\AclServiceProvider;
use Neputer\Utils\Generator\Providers\GeneratorServiceProvider;

/**
 * Class NeputerServiceProvider
 * @package Neputer\Providers
 */
class NeputerServiceProvider
{

    /**
     * Will register the array of ServiceProviders
     *
     * @return array
     */
    public static function providers()
    {
        return [
            ConfigServiceProvider::class,
            ComposerServiceProvider::class,
            // Utils Providers
            GeneratorServiceProvider::class,
            HelperServiceProvider::class,
            ObserverServiceProvider::class,
        ];
    }

}
