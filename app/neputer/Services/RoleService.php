<?php

namespace Neputer\Services;


use Spatie\Permission\Models\Role;

/**
 * Class RoleService
 * @package Neputer\Services
 */
class RoleService extends BaseService
{

    /**
     * The Role instance
     *
     * @var $model
     */
    protected $model;

    /**
     * RoleService constructor.
     * @param Role $role
     */
    public function __construct(Role $role)
    {
        $this->model = $role;
    }

    public function getEditData($id)
    {
        return $this->model->find($id);
    }
}
