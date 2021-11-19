<?php

namespace Neputer\Services;

use Neputer\Utils\Acl\Entities\Permission;

/**
 * Class PermissionService
 * @package Neputer\Services
 */
class PermissionService extends BaseService
{

    /**
     * The Permission instance
     *
     * @var $model
     */
    protected $model;

    /**
     * PermissionService constructor.
     * @param Permission $permission
     */
    public function __construct(Permission $permission)
    {
        $this->model = $permission;
    }

}
