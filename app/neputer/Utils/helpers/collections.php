    +<?php

use App\Facades\AppHelperFacade;

if (! function_exists('get_route')) :

    /**
     * If Default property is false
     * No need to add our route prefix and can check if route exists directly
     * While if true , then add the prefix for the route and resolve the route name
     */
    function get_route($route_name, bool $default = true)
    {
        if (is_array($route_name)) {
            return '#';
        }

        $route_name = $default ?
            config('neputer.backend_route_prefix', 'admin').'.'.$route_name :
            $route_name;

        if (app('router')->has($route_name)) {
            return route($route_name);
        }

        return '#';
    }

endif;

if (! function_exists('route_is_active')) :

    /**
     * The first parameter is route which mean after the prefix and
     * The second parameter is a class , active by default
     */
    function route_is_active($routes, $class = 'active') {

        if (is_array($routes)) :
            $result = [];

            foreach ($routes as $route) {
                $result[] = request()->is(config('neputer.backend_route_prefix', 'admin')."/{$route}*") ?
                    $class : '';
            }

            return implode('', $result);
        endif;

        return request()->is(config('neputer.backend_route_prefix', 'admin')."/{$routes}*") ?
            $class : '';
    }

endif;

    if (! function_exists('currency')) :
        /**
         * get price and add currency type
         */
        function currency($price)
        {
            $currency =  AppHelperFacade::getSiteConfigByKey('default_currency');
            $new_price = $currency.$price;
            return $new_price;
        }
        endif;
