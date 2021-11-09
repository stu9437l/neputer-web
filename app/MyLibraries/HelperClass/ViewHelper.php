<?php
/**
 * Created by PhpStorm.
 * User: shant0s
 * Date: 3/27/2018
 * Time: 3:01 PM
 */

namespace App\MyLibraries\HelperClass;


class ViewHelper
{

    public function getAssetPath($path, $asset_type)
    {

        $asset_path = config('myPath.assets.theme.panel.' . $asset_type);

        return asset($asset_path . $path);
    }

    public function getImagePath($folder, $image_name)
    {
        if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $folder . DIRECTORY_SEPARATOR . $image_name)) {
            if (!$image_name) {
                return asset('image/no_image.jpg');
            }

            return asset('image/' . $folder . '/' . $image_name);
        }
        return asset('image/no_image.png');

    }

    public function getFrontEndAssetPath($path, $asset_type)
    {

        $asset_path = config('myPath.assets.frontend.' . $asset_type);

        return asset($asset_path . $path);

    }

}