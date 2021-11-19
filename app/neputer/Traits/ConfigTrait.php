<?php

namespace Neputer\Traits;

use Illuminate\Support\Arr;

/**
 * Trait ConfigTrait
 * @package Neputer\Traits
 */
trait ConfigTrait
{

    /**
     * Retrieve using Dot Notation
     * @param $key
     * @param $default
     * @return mixed
     */
    public function retrieve($key, $default = null)
    {
        return Arr::get($this->config, $key) ?? $default;
    }

}
