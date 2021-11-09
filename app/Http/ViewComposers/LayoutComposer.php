<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 5/25/2018
 * Time: 3:24 PM
 */

namespace App\Http\ViewComposers;


use App\Facades\AppHelperFacade;
use App\Model\Category;
use App\Model\Currencies;
use App\Model\MenuSection;
use Illuminate\Support\Facades\App;
use Illuminate\View\View;


class LayoutComposer
{

    public function compose(View $view)
    {

        $lang = \Cookie::get('language');
        $view->with('_lang', $lang?$lang:config('app.locale'));
        $view->with('_lang_flag', $lang == 'en'?'en.jpg':'fr.jpg');

        $currency = \Cookie::get('currency');

//        if(!$currency)
//        {
//            $default_currency = Currencies::select('currency_code')->where('is_default', 1)->first();
//        }
//
//        $view->with('_currency', $currency?$currency:$default_currency->currency_code);
//        $view->with('_currencies', Currencies::select('currency_code', 'symbol')->orderBy('rank')->Status()->get());


        //for menu sections
        $view->with('_menus', $this->getMenuPages());

        //for top search bar shop/home/includes
//        $view->with('_categories', Category::Status()->with('children')->where('parent_id', 0)->OrderByTitleAsc()->get());
        $view->with('_settings', AppHelperFacade::getSiteConfigs());


    }

    protected function getMenuPages(){

        $menus = MenuSection::select('id', 'title', 'slug')->with('pages:title,slug,open_in,page_type,link,content')->get();
        $data = [];

        foreach($menus as $menu){
            $data[$menu->slug] = [
                'title' => $menu->title,
                'pages' => $menu->pages,
//                            ->select('title', 'slug', 'open_in', 'page_type', 'link', 'content')
//                            ->Status()
//                            ->orderBy('rank')
//                            ->get(),
            ];

        }

//        dd($data);
        return $data;
    }

}