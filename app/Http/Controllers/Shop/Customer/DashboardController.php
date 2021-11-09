<?php

namespace App\Http\Controllers\Shop\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    public function index(){
        return redirect('cart');
    }
}
