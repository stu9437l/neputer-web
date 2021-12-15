<?php

namespace Foundation\Lib;

use ArrayAccess;
use App\Model\SiteConfig;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class Meta extends Cache
{

    /**
     * Return value for given dotted key
     *
     * if key : notifier.email than notifier will be the key for site_configs table column or config name
     * And after that dotted will be the key for json encoded data
     *
     * @param $key
     * @return array|ArrayAccess|mixed
     */
    public static function args($key)
    {
        $first = null;
        if (Str::contains($key, '.')) {
            $args = explode('.', $key);
            $first = head($args);
        }

        $meta = Meta::get($first);

        if (isset($meta)) {
            $arrs = Utility::isJson($meta) ? json_decode($meta, 1) : $meta;
        } else {
            $arrs = config($first);
        }
        return Arr::get($arrs, str_replace($first.'.', '', $key));
    }

    public static function get($key, $default = null)
    {
        return \Cache::remember(Meta::resolveKey($key), Cache::TIME_INTERVAL, function () use ($key, $default) {
            return app('db')
                    ->table('site_configs')
                    ->where('key', $key)
                    ->value('value') ?? $default;
        });
    }

    public static function set($key, $value)
    {
        $isArr = is_array($value);

        app('db')
            ->table('site_configs')
            ->updateOrInsert(
                [ 'key' => $key, ],
                [ 'value' => $isArr ? Utility::jsonEncode($value) : $value, ]
            );

        Cache::forget( self::resolveKey($key) );
    }

    public static function first($key)
    {
        return \Cache::remember(static::resolveKey($key), Cache::TIME_INTERVAL, function () use ($key) {
            return SiteConfig::query()
                ->where('key', $key)
                ->first();
        });
    }

}