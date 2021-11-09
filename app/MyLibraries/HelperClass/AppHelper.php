<?php
/**
 * Created by PhpStorm.
 * User: acer
 * Date: 4/10/2018
 * Time: 9:10 AM
 */

namespace App\MyLibraries\HelperClass;


use App\Model\Currencies;
use App\Model\SiteConfig;
use App\User;

class AppHelper
{
    public $site_configuration;

    public static function getFolderName($panel)
    {
        return config('myPath.assets.image_panel_folder.' . $panel);
    }

    public function getPrice($price)
    {
        if (\Cookie::has('currency')) {
            $currency = Currencies::where('currency_code', \Cookie::get('currency'))->first();
            if (!$currency) {
                abort(401);
            }
        } else {
            $currency = Currencies::where('is_default', 1)->first();
            if (!$currency) {
                abort(401);
            }
        }

        $price = $this->toNumber($price);
        return $currency->symbol . '. ' . $price * $currency->rate;
    }

    public function toNumber($str)
    {
        if (is_null($str)) {
            return 1;
        }
        return preg_replace("/([^0-9\\.])/i", "", $str);
    }

    public function getUserVerificationToken()
    {

        $token = sha1(mt_rand(1, 90000) . 'laravel-18-03');
        while (User::where('verification_token', $token)->count() > 0) {
            $token = sha1(mt_rand(1, 90000) . 'laravel-18-03');
        }

        return $token;

    }

    public function isCustomerLogin()
    {

        if (!auth()->check()) {
            return false;
        } else {
            $user = auth()->user();
            $roles = $user->roles()->pluck('role', 'slug')->toArray();

            if (array_key_exists('customer', $roles))
                return true;
            else
                return false;
        }

    }

    //for stripe payment in checkout
    public function getStripeCredentials($key = 'publishable_key')
    {

        $credentials = config('myPath.payment-gateways.stripe.credentials');
        return $credentials[$key];
    }

    public function is_json($string)
    {
        return is_string($string) && is_array(json_decode($string, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }

    public function getSiteConfigs()
    {
        if ($this->site_configuration)
            return $this->site_configuration;

        $configs = SiteConfig::pluck('value', 'key');
        $this->site_configuration = $configs;

        return $this->site_configuration;
    }

    public function getSiteConfigByKey($key)
    {
        $configs = $this->getSiteConfigs();
        return $configs[$key];
    }

    public function getSiteConfiguration()
    {
        if ($this->site_configuration)
            return $this->site_configuration;

        $settings = SiteConfig::pluck('value', 'key')->toArray();
        $configs = [];
        foreach ($settings as $key => $value) {
            $configs[$key] = $this->is_json($value) ? json_decode($value, 1) : $value;
        }
        $this->site_configuration = $configs;

        return $this->site_configuration;
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


}