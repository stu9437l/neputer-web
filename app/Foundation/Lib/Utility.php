<?php

namespace Foundation\Lib;

final class Utility
{

    public static function isJson($str)
    {
        return is_string($str) && is_array(json_decode($str, true)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
    
}