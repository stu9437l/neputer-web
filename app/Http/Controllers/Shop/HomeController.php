<?php

namespace App\Http\Controllers\Shop;

use App\Facades\AppHelperFacade;
use App\Model\Category;
use App\Model\OfferType;
use App\Model\OfferTypeProduct;
use App\Model\ProductSectionType;
use App\Model\SiteConfig;
use App\Model\Slider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;


class HomeController extends BaseController
{


    public function index()
    {
//        Session()->flush();
        $data = [];
        $data['banners'] = Slider::select('image', 'alt_text', 'caption', 'caption_two')
            ->Status()
            ->OrderByRankAsc()
            ->get();

        $data['categories'] = Category::select('title', 'slug')
            ->Status()
            ->OrderByTitleAsc()
            ->get();

        $data['productSectionTypes'] = ProductSectionType::Status()
            ->OrderByRankAsc()
            ->get();

        $data['settings'] = AppHelperFacade::getSiteConfiguration();
        return view('shop.home.index', compact('data'));
    }


}
