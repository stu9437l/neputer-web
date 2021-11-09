<?php

namespace App\Policies;

use App\Model\Action;
use App\Model\ProductSectionType;
use App\Model\Panel;
use App\Model\RoleAssign;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ProductSectionTypePolicy extends BasePolicy
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
        $this->panel_id = Panel::select('id')->where('title', 'product-section-type')->first()->toArray();
    }

    /**
     * @param User $user
     * @param ProductSectionType $productSectionType
     * @return bool
     */
    public function view(User $user, ProductSectionType $productSectionType)
    {
        return $this->checkRole('show');
    }

    /**
     * Determine whether the user can create products.
     *
     * @param  \App\User $user
     * @return mixed
     */
    public function create(User $user, ProductSectionType $productSectionType)
    {
        return $this->checkRole('create');
    }

    /**
     * Determine whether the user can update the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\ProductSectionType $productSectionType
     * @return mixed
     */
    public function edit(User $user, ProductSectionType $productSectionType)
    {
        return $this->checkRole('edit');
    }

    /**
     * Determine whether the user can delete the product.
     *
     * @param  \App\User $user
     * @param  \App\Model\ProductSectionType $productSectionType
     * @return mixed
     */
    public function delete(User $user, ProductSectionType $productSectionType)
    {
        return $this->checkRole('delete');
    }
}
