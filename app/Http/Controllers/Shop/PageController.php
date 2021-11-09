<?php

namespace App\Http\Controllers\Shop;

use App\Facades\AppHelperFacade;
use App\Model\Category;
use App\Model\OfferType;
use App\Model\OfferTypeProduct;
use App\Model\Pages;
use App\Model\Slider;
use App\Http\Controllers\Controller;


class PageController extends BaseController
{

    public function index($slug)
    {
        $data = [];
        $data['slug'] = $slug;
        $data['title'] = '';
        $data['image'] = '';
        $data['content'] = '';
        if($slug == 'terms-conditions'){
            $data['title'] = AppHelperFacade::getSiteConfigByKey('terms_and_conditions_title');
            $data['image'] = AppHelperFacade::getSiteConfigByKey('terms_and_conditions_banner');
            $data['content'] = AppHelperFacade::getSiteConfigByKey('terms_and_conditions');
        }
        return view('shop.pages.pages.index', compact('data'));
    }

}
