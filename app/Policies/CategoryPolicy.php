<?php

namespace App\Policies;


use App\Model\Action;
use App\Model\Category;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CategoryPolicy extends BasePolicy
{
    use HandlesAuthorization;
    protected $roles;
    protected $actions;
    protected $panel_id;

    public function __construct()
    {
        $this->roles = auth()->user()->roles;
        $this->actions = Action::select('id','title')->get();
        $this->role_assignment = new RoleAssign();
        $this->panel_id = Panel::select('id')->where('title', 'category')->first()->toArray();
    }

    /**
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function view(User $user, Category $category)
    {
        return $this->checkRole('show');
    }

    /**
     * @param User $user
     * @param Category $category
     * @return bool
     */
    public function create(User $user, Category $category)
    {
        return $this->checkRole('create');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\Category $category
     * @return mixed
     */
    public function edit(User $user, Category $category)
    {
        return $this->checkRole('edit');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\Category $category
     * @return mixed
     */
    public function delete(User $user, Category $category)
    {
        return $this->checkRole('delete');
    }
}
