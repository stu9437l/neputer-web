<?php

namespace App\Policies;

use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use App\Model\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy extends BasePolicy
{
    use HandlesAuthorization;
    protected $role_assignment;
    protected $panel_id;
    protected $roles;


    public function __construct()
    {
        $this->roles = auth()->user()->roles;
        $this->role_assignment = new RoleAssign();
        $this->panel_id = Panel::select('id')->where('title', 'roles')->first()->toArray();

    }

    /**
     * @param User $user
     * @param Role $role
     * @return bool
     */
    public function view(User $user, \App\Model\Role $role)
    {
        return $this->checkRole('show');
    }


    /**
     * @param User $user
     * @param Role $role
     * @return bool
     */
    public function edit(User $user, Role $role)
    {
        return $this->checkRole('edit');
    }

}
