<?php

namespace Neputer\Services;

use Neputer\Traits\ConfigTrait;

/**
 * Class MenuService
 * @package Neputer\Services
 */
class MenuService
{

    use ConfigTrait;

    /**
     * The Config instance
     *
     * @var $config
     */
    protected $config;

    /**
     * MenuService constructor.
     */
    public function __construct()
    {
        $this->config = config('menu');
    }

    /**
     * @return mixed
     */
    public function retrieveMenu()
    {
        return $this->retrieve('admin', []);
    }

}
