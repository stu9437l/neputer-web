<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class RoleAssignPolicy extends BasePolicy
{
    use HandlesAuthorization;
    protected $role_assignment;
    protected $actions;
    protected $panel_id;
    protected $roles;


    public function __construct()
    {
        $this->roles = auth()->user()->roles;
        $this->actions = Action::select('id','title')->get();
        $this->role_assignment = new RoleAssign();
        $this->panel_id = Panel::select('id')->where('title', 'roles-assignment')->first()->toArray();
    }

    /**
     * Determine whether the user can view the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, RoleAssign $roleAssign)
    {
        return $this->checkRole('show');
    }


    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */

    public function create(User $user, RoleAssign $roleAssign)
    {
        return $this->checkRole('create');
    }

    public function edit(User $user, RoleAssign $roleAssign)
    {
        return $this->checkRole('edit');
    }
    public function delete(User $user, RoleAssign $roleAssign)
    {
        return $this->checkRole('delete');
    }

}

