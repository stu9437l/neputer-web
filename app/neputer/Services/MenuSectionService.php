<?php

namespace Neputer\Services;

use Neputer\Entities\MenuSection;

/**
 * Class MenuSectionService
 * @package Neputer\Services
 */
class MenuSectionService extends BaseService
{

    /**
     * The MenuSection instance
     *
     * @var $model
     */
    protected $model;

    /**
     * MenuSectionService constructor.
     * @param MenuSection $menusection
     */
    public function __construct(MenuSection $menusection)
    {
        $this->model = $menusection;
    }

}
