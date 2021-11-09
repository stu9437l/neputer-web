<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy extends BasePolicy
{
    use HandlesAuthorization;
    protected $roles;
    protected $actions;
    protected $panel_id;


    public function __construct()
    {
        $this->roles = auth()->user()->roles;
        $this->actions = Action::select('id', 'title')->get();
        $this->role_assignment = new RoleAssign();
        $this->panel_id = Panel::select('id')->where('title', 'user')->first()->toArray();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function view(User $user, User $model)
    {
        return $this->checkRole('show');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->checkRole('create');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function edit(User $user, User $model)
    {
        return $this->checkRole('edit');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\User  $model
     * @return mixed
     */
    public function delete(User $user, User $model)
    {
        return $this->checkRole('delete');
    }

}
