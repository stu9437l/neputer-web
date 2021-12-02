<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 5/25/2018
 * Time: 3:24 PM
 */

namespace App\Http\ViewComposers;


use App\Facades\AppHelperFacade;
use App\Model\MenuSection;
use Illuminate\View\View;


class LayoutComposer
{
        public function compose(View $view)
        {
            $lang =  \Cookie::get('language');
            $view->with('_lang',$lang?$lang:config('app.locale'));
            $view->with('_lang_flag',$lang == 'en'?'en.jpg':'fr.jpg');
            $view->with('_menus',$this->getMenuPages());
            $view->with('_settings',AppHelperFacade::getSiteConfigs());
        }

        protected function getMenuPages()
        {
            $menus = MenuSection::select('id', 'title', 'slug')
                ->with('pages:title,slug,open_in,page_type,link,content')
                ->get();

            $data = [];
            foreach($menus as $menu){
                $data[$menu->slug] = [
                    'title'     => $menu->title,
                    'pages'     => $menu->pages,
                ];
            }
            return $data;
        }

}