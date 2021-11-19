<?php

namespace Neputer\Services;

use Neputer\Utils\Acl\Entities\Group;

/**
 * Class PermissionGroupService
 * @package Neputer\Services
 */
class PermissionGroupService extends BaseService
{

    /**
     * The PermissionGroup instance
     *
     * @var $model
     */
    protected $model;

    /**
     * PermissionGroupService constructor.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->model = $group;
    }

}
