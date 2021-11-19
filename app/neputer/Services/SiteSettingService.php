<?php

namespace Neputer\Services;

use Neputer\Entities\SiteSetting;
use Neputer\Traits\FileUploadTrait;

/**
 * Class SiteSettingService
 * @package Neputer\Services
 */
class SiteSettingService extends BaseService
{
    use FileUploadTrait;
    /**
     * The SiteSetting instance
     *
     * @var $model
     */
    protected $model;
    protected $image_name=null;
    protected $folder_path;
    protected $folder;
    protected $image_dimensions;

    /**
     * SiteSettingService constructor.
     * @param SiteSetting $sitesetting
     */
    public function __construct(SiteSetting $sitesetting)
    {
        $this->model = $sitesetting;
        $this->folder = config('neputer.assets.panel_image_folders.site-setting');
        $this->folder_path = public_path('assets/admin/images' . DIRECTORY_SEPARATOR . $this->folder);
        $this->image_dimensions = config('neputer.image-dimensions.site-setting');
    }

    public function allAsKeyVal()
    {
        $data = $this->changeJsonToArray($this->model->pluck('value', 'key')->toArray());
        return $data;
    }

    public function updateSiteSettings($request, $folder_path)
    {

        $data = $this->prepareDataToUpdate($request);

        $logo_row = SiteSetting::where('key', 'logo')->first();
//        $banner_image = SiteSetting::where('key', 'home_page_image')->first();
//dd($banner_image, $logo_row, $data);
        $this->_uploadImage($request,'update',$logo_row->value);
        $this->uploadImageThumbs($request,'update',$logo_row->value);

        if($logo_row){
            $logo_row->value = $this->image_name;
            $logo_row->save();
        }
//        $this->_uploadImage($request,'update',$banner_image->value,$request->file('banner_image'));
//        $this->uploadImageThumbs($request,'update',$banner_image->value,$request->file('banner_image'));

//        if($banner_image){
//            $banner_image->value = $this->image_name;
//            $banner_image->save();
//        }

        foreach ($data as $key => $value) {

            $setting = SiteSetting::where('key', $key)->first();

            if ($setting){
                switch ($key) {

                    case 'social_links':
                        if ($setting) {
                            $setting->value = $this->prepareSocialLinks($value);
                            $setting->save();
                        }
                        break;

                    default:
                        if ($setting) {
                            $setting->value = $value;
                            $setting->save();
                        }

                }
            }else{
                $this->model->create([
                    'key'=> $key,
                    'value'=>$value,
                    'updated_by'=>auth()->id()
                ]);
            }



        }

        return true;
    }

    public function prepareDataToUpdate($request)
    {
        $data = $request->get('content');
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                $data[$key] = json_encode($value);
            }
        }

        return $data;
    }

    public function prepareSocialLinks($value)
    {
        $settings = SiteSetting::pluck('value', 'key')->toArray();
        $social_links = json_decode($settings['social_links'], 1);
        $data = json_decode($value, 1);
        foreach ($data as $key => $value) {
            $data[$key]['title'] = $social_links[$key]['title'];
        }

        return json_encode($data);
    }

    /** Helper Methods **/

    public function changeJsonToArray($data)
    {
        foreach ($data as $key => $row) {
            if ($this->isJson($data[$key])) {
                $data[$key] = json_decode($row, 1);
            }
        }

        return $data;
    }

    public function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
