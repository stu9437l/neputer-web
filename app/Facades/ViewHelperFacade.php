<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 4/10/2018
 * Time: 11:48 PM
 */

namespace App\Facades;


use Illuminate\Support\Facades\Facade;

class ViewHelperFacade extends Facade
{

    protected static function getFacadeAccessor() {
        return 'viewhelper';
    }

}