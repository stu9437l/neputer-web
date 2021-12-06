<?php

namespace App\Http\Controllers\Admin;

use App\Model\SiteConfig;
use Foundation\Lib\Cache;
use Illuminate\Http\Request;
use App\Facades\AppHelperFacade;
use Illuminate\Support\Facades\File;

class SiteConfigController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.site_config';
    protected $base_route = 'admin.site-configs';
    protected $panel = 'Site Config';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new SiteConfig();
        $this->folder = config('myPath.assets.image_panel_folder.site_configuration');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }

    public function edit()
    {
        $data = [];
        $data['settings'] = $this->getSettings();
        return view(parent::loadDefaultViewPath($this->view_path . '.edit'), compact('data'));

    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function update(Request $request)
    {
        $imageName = $this->pluckToArray();
        $image = $imageName['logo'] ?? null;
        $belowProductSectionBanner = $imageName['below_product_section_banner'] ?? null;
        $testimonialSectionBanner = $imageName['testimonial_section_banner'] ?? null;
        $termsAndConditionBanner = $imageName['terms_and_conditions_banner'] ?? null;
        $aboutImageBanner = $imageName['about_image'] ?? null ;
        $careerImageBanner = $imageName['career_image'] ?? null;
        $developmentProcess = $imageName['development_process_image'] ?? null;
        $ourTeamBanner = $imageName['our_team_image'] ?? null;
        $serviceImageBanner = $imageName['service_image'] ?? null;
        $blogBannerImage = $imageName['blog_banner'] ?? null;
        $ourClientBannerImage = $imageName['our_client_banner'] ?? null;
        $serviceOverviewImage = $imageName['service_overview_image'] ?? null;
        $serviceDetailImage = $imageName['service_detail_image'] ?? null;
        $contactBannerImage = $imageName['contact_banner_image'] ?? null;
        $neputerLogo = $imageName['neputer_logo'] ?? null;
        $icon1 = $imageName['icon1'] ?? null;
        $icon2 = $imageName['icon2'] ?? null;
        $icon3 = $imageName['icon3'] ?? null;
        $icon4 = $imageName['icon4'] ?? null;
        $icon5 = $imageName['icon5'] ?? null;
        $icon6 = $imageName['icon6'] ?? null;
        $quoteBannerImage = $imageName['quote_banner_image'] ?? null;
        $blogSideBarImage = $imageName['blog_sidebar_image'] ?? null;

        if ($request->hasFile('image')) {
          $image =  $this->uploadSettingImages($request->file('image'), $image);
        }

        if ($request->hasFile('below_product_section_image')) {
            $belowProductSectionBanner = $this->uploadSettingImages($request->file('below_product_section_image'), $belowProductSectionBanner);
        }

        if ($request->hasFile('testimonial_section_image')) {
            $testimonialSectionBanner = $this->uploadSettingImages($request->file('testimonial_section_image'),  $testimonialSectionBanner);
        }

        if ($request->hasFile('terms_and_conditions_image')) {
            $termsAndConditionBanner = $this->uploadSettingImages($request->file('terms_and_conditions_image'),  $termsAndConditionBanner);
        }

        if($request->hasFile('about')){
            $aboutImageBanner = $this->uploadSettingImages($request->file('about') , $aboutImageBanner);
        }

        if($request->hasFile('career')){
            $careerImageBanner = $this->uploadSettingImages($request->file('career') , $careerImageBanner);
        }

        if($request->hasFile('development_process')){
            $developmentProcess = $this->uploadSettingImages($request->file('development_process') , $developmentProcess);
        }

        if($request->hasFile('our_team')){
            $ourTeamBanner = $this->uploadSettingImages($request->file('our_team') , $ourTeamBanner);
        }

        if ($request->hasFile('service')) {
            $serviceImageBanner = $this->uploadSettingImages($request->file('service'), $serviceImageBanner);
        }

        if ($request->hasFile('blog')) {
            $blogBannerImage = $this->uploadSettingImages($request->file('blog'), $blogBannerImage);
        }

        if ($request->hasFile('our_client')) {
            $ourClientBannerImage = $this->uploadSettingImages($request->file('our_client'), $ourClientBannerImage);
        }
        if ($request->hasFile('service_overview')) {
            $serviceOverviewImage = $this->uploadSettingImages($request->file('service_overview'), $serviceOverviewImage);
        }

        if ($request->hasFile('service_detail')) {
            $serviceDetailImage = $this->uploadSettingImages($request->file('service_detail'), $serviceDetailImage);
        }
        if ($request->hasFile('contact')) {
            $contactBannerImage = $this->uploadSettingImages($request->file('contact'), $contactBannerImage);
        }

        if ($request->hasFile('neputer')) {
            $neputerLogo = $this->uploadSettingImages($request->file('neputer'), $neputerLogo);
        }
        if ($request->hasFile('icon_1')) {
            $icon1 = $this->uploadSettingImages($request->file('icon_1'), $icon1);
        }
        if ($request->hasFile('icon_2')) {
            $icon2 = $this->uploadSettingImages($request->file('icon_2'), $icon2);
        }
        if ($request->hasFile('icon_3')) {
            $icon3 = $this->uploadSettingImages($request->file('icon_3'), $icon3);
        }
        if ($request->hasFile('icon_4')) {
            $icon4 = $this->uploadSettingImages($request->file('icon_4'), $icon4);
        }
        if ($request->hasFile('icon_5')) {
            $icon5 = $this->uploadSettingImages($request->file('icon_5'), $icon5);
        }
        if ($request->hasFile('icon_6')) {
            $icon6 = $this->uploadSettingImages($request->file('icon_6'), $icon6);
        }
        if ($request->hasFile('quote_image')) {
            $quoteBannerImage = $this->uploadSettingImages($request->file('quote_image'), $quoteBannerImage);
        }
        if ($request->hasFile('blog_sidebar')) {
            $blogSideBarImage = $this->uploadSettingImages($request->file('blog_sidebar'), $blogSideBarImage);
        }

        $this->updateSetting($request->merge([
            'logo' => $image,
            'below_product_section_banner' => $belowProductSectionBanner,
            'testimonial_section_banner' => $testimonialSectionBanner,
            'terms_and_conditions_banner' => $termsAndConditionBanner,
            'about_image' => $aboutImageBanner,
            'career_image' => $careerImageBanner,
            'development_process_image' => $developmentProcess,
            'our_team_image' => $ourTeamBanner,
            'service_image' => $serviceImageBanner,
            'blog_banner' => $blogBannerImage,
            'our_client_banner' => $ourClientBannerImage,
            'service_detail_image' => $serviceDetailImage,
            'service_overview_image' => $serviceOverviewImage,
            'contact_banner_image' => $contactBannerImage,
            'neputer_logo' => $neputerLogo,
            'icon1' => $icon1,
            'icon2' => $icon2,
            'icon3' => $icon3,
            'icon4' => $icon4,
            'icon5' => $icon5,
            'icon6' => $icon6,
            'quote_banner_image' => $quoteBannerImage,
            'blog_sidebar_image' => $blogSideBarImage,

        ])->except(
            '_method', '_token', 'image',
            'about','career','development_process',
            'our_team','service','blog','our_client',
            'service_overview','service_detail','contact',
            'neputer','icon_1','icon_2','icon_3','icon_4','icon_5',
            'icon_6','quote_image','blog_sidebar'
        ));


        Cache::forget( Cache::CACHE_SETTINGS_KEY );
        $request->session()->flash('success-message', $this->panel . ' updated Successfully!!');
        return redirect()->route($this->base_route . '.edit');
    }


    /**
     * Get the settings in array format
     *
     * @return mixed
     */
    protected function getSettings()
    {
        $data = [];
        foreach ($this->pluckToArray() as $key => $value) {
            $data[$key] = AppHelperFacade::is_json($value) ? json_decode($value, 1) : $value;
        }
        return $data;
    }

    /**
     * Get the settings from database
     *
     * @return mixed
     */
    protected function pluckToArray()
    {
        return $this->model->pluck('value', 'key')->toArray();
    }

    /**
     * Update the website settings
     *
     * @param array $data
     * @param $model
     * @return bool|mixed|void
     * @throws \Exception
     */
    public function updateSetting(array $data)
    {
        try {

            foreach ($data as $key => $value) {
                $this->model->updateOrCreate(['key' => $key,], [
                    'key' => $key,
                    'value' => is_iterable($value) ? json_encode($value) : $value,
                ]);
            }

            return true;
        } catch (\Exception $exception) {
            return;
        }
    }

    public function uploadSettingImages($image, $image_name)
    {
        $imageName = time().mt_rand(4100, 9999).'_'.$image->getClientOriginalName();
        if(!file_exists($this->folder_path)){
            File::makeDirectory($this->folder_path, 0775, true);
        }
        $image->move($this->folder_path, $imageName);
        if($image_name) {
            if($image_name && file_exists($this->folder_path.DIRECTORY_SEPARATOR.$image_name)){
                unlink($this->folder_path.DIRECTORY_SEPARATOR.$image_name);
            }
        }
        return $imageName;
    }


}
