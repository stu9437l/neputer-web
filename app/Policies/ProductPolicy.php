<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use App\Model\Product;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductPolicy extends BasePolicy
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
        $this->panel_id = Panel::select('id')->where('title', 'product')->first()->toArray();
    }

    /**
     * Determine whether the user can view the product.
     *
     * @param User $user
     * @param  \App\Model\Product $product
     * @return mixed
     */
    public function view(User $user, \App\Model\Product $product)
    {
        return $this->checkRole('show');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param User $user
     * @return mixed
     */
    public function create(User $user, Product $product)
    {
        return $this->checkRole('create');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param User $user
     * @param  \App\Model\Product $product
     * @return mixed
     */
    public function edit(User $user, Product $product)
    {
        return $this->checkRole('edit');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param User $user
     * @param  \App\Model\Product $product
     * @return mixed
     */
    public function delete(User $user, Product $product)
    {
        return $this->checkRole('delete');
    }
}
