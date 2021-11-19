<?php

namespace Neputer\Services;

use Neputer\Entities\Dashboard;

/**
 * Class DashboardService
 * @package Neputer\Services
 */
class DashboardService extends BaseService
{

    /**
     * The Dashboard instance
     *
     * @var $model
     */
    protected $model;

    /**
     * DashboardService constructor.
     * @param Dashboard $dashboard
     */
    public function __construct(Dashboard $dashboard)
    {
        $this->model = $dashboard;
    }

}
