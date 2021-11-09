<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 4/10/2018
 * Time: 9:08 AM
 */

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class AppHelperFacade extends Facade
{
    protected static function getFacadeAccessor() {
        return 'apphelper';
    }
}