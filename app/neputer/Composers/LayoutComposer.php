<?php
/**
 * Created by PhpStorm.
 * User: neputer
 * Date: 4/8/19
 * Time: 2:28 PM
 */

namespace Neputer\Composers;


use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Neputer\Entities\Activity;
use Neputer\Entities\Destination;
use Neputer\Entities\Representative;
use Neputer\Entities\SiteSetting;

class LayoutComposer
{

    public function compose(View $view)
    {
        $view->with('_siteConfigs', $this->getSiteConfigData());
        $view->with('_menu_sections',$this->footer_menu());
        $view->with('_destination',$this->destinationMenu());
        $view->with('_social_links',$this->socialLink());
        $view->with('_header_menu',$this->headerMenu());
        $view->with('representatives',$this->representatives());

    }

    public function getSiteConfigData()
    {
        $data = [];
        $data['from_settings'] = SiteSetting::get();

        $siteConfigs = [];
        foreach ($data['from_settings'] as $from_setting) {
            $siteConfigs[$from_setting->key] = $from_setting->value;
        }

        return $siteConfigs;
    }

    public function socialLink()
    {
        $data = [];
        $data['from_settings'] = SiteSetting::get();
//        dd($data['from_settings']);

        $siteConfigs = [];
        foreach ($data['from_settings'] as $from_setting) {
            $siteConfigs[$from_setting->key] = $from_setting->value;
        }
        $social = json_decode($siteConfigs['social_links'],true);
       return $social;

    }
    public function destinationMenu()
    {
        $data = [];
        $data['destination'] = Destination::pluck('title','id');
        $data['activity'] = Activity::select('activities.title','activities.id as activity_id','destinations.title as destination',
            'destinations.id as destination_id')
                    ->join('destinations','destinations.id','=','activities.destination_id')
                    ->get();

//        dd($data['activity']);
        return $data;
    }

    public function footer_menu()
    {
        $footer = [];
        $rows = DB::table('menu_section_page')->select('menu_section.slug as menu_section_slug','menu_section.title as section_title',
            'pages.title as page_title','pages.slug as page_slug','pages.content','page_type','pages.open_in','pages.page_image',
                'pages.link')
            ->join('menu_section','menu_section.id', '=','menu_section_page.menu_section_id')
            ->join('pages','pages.id','=','menu_section_page.page_id')
            ->where('pages.status',1)
            ->orderBy('menu_section_page.rank','asc')
            ->get();

        foreach ($rows as $row){
            $footer[$row->menu_section_slug][$row->page_slug] = $row;
        }
        return $footer;
    }

    public function headerMenu()
    {
     $destination = Destination::with(['activities' => function ($query) {
         $query->orderBy('title','asc');
     }])->select('id','title','slug')
         ->where('status',1)
         ->get();

     return $destination;
    }

    public function representatives()
    {
        return Representative::select('name','address','contact','email','country','image','status')->where('status',1)->get();
    }

}
