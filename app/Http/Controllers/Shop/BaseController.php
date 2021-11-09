<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 5/25/2018
 * Time: 4:06 PM
 */

namespace App\Http\Controllers\Shop;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;

class BaseController extends Controller
{

    public function __construct()
    {
//        if($lang = Crypt::decrypt(\Cookie::get('language'))){
//            App::setLocale($lang);
//        }
    }

}