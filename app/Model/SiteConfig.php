<?php

namespace App\Model;


class SiteConfig extends BaseModel
{

    protected $table = 'site_configs';

    protected $fillable = ['key', 'value'];
}
