<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\Page;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PagePolicy extends BasePolicy
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
        $this->panel_id = Panel::select('id')->where('title', 'page')->first()->toArray();
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\Product $page
     * @return mixed
     */
    public function view(User $user, Page $page)
    {
        return $this->checkRole('show');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user, Page $page)
    {
        return $this->checkRole('create');
    }


    public function edit(User $user, Page $page)
    {
        return $this->checkRole('edit');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\Page $page
     * @return mixed
     */


    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\Page $page
     * @return mixed
     */
    public function delete(User $user, Page $page)
    {
        return $this->checkRole('delete');
    }
}
