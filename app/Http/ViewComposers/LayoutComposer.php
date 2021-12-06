<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;
use App\Model\MenuSection;
use App\Facades\AppHelperFacade;
use Illuminate\Support\Facades\Cache;
use Foundation\Lib\Cache as NeputerCache;

class LayoutComposer
{
        public function compose(View $view)
        {
            $lang =  \Cookie::get('language');
            $view->with('_lang', $lang?$lang:config('app.locale'));
            $view->with('_lang_flag', $lang == 'en'?'en.jpg':'fr.jpg');
            $view->with('_menus', $this->getMenuPages());
            $view->with('_settings', AppHelperFacade::getSiteConfigs());
        }

        protected function getMenuPages()
        {
            return Cache::rememberForever(NeputerCache::resolveKey( NeputerCache::CACHE_MENU_SECTION_KEY ), function () {
                return MenuSection::select('id', 'title', 'slug')
                    ->with('pages:title,slug,open_in,page_type,link,content')
                    ->get();
            })->mapWithKeys(function ($menu) {
                return [
                    $menu->slug => [
                        'title'     => $menu->title,
                        'pages'     => $menu->pages,
                    ],
                ];
            });
        }

}