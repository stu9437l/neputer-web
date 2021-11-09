<?php

namespace App\Http\Controllers\Shop;

use App\Model\Category;
use App\Model\OfferType;
use App\Model\OfferTypeProduct;
use App\Model\Pages;
use App\Model\Slider;
use App\Http\Controllers\Controller;


class AboutUsController extends BaseController
{

    public function index()
    {
        $data = [];
        $data['about-us'] = Pages::where('slug', 'about-us')->first();
//        dd($data['about-us']);
        return view('shop.pages.about-us.index', compact('data'));
    }

}
