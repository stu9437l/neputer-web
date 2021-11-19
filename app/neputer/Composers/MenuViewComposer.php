<?php

namespace Neputer\Composers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Neputer\Entities\Business;
use Neputer\Services\MenuService;

/**
 * Class MenuViewComposer
 * @package Neputer\Composers
 */
class MenuViewComposer
{

    /**
     * The MenuService instance
     * @var $menuService
     */
    protected $menuService;

    /**
     * MenuViewComposer constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('sideMenu', $this->menuService->retrieveMenu());
        $view->with('businessVerified', $this->businessVerified());

    }

    public function businessVerified()
    {
        $user = Auth::user();
        $business = Business::select('status')->where('user_id', $user->id)->first();
        if ($business->status == 1){
            return true;
        }else{
            return false;
        }

    }

}
