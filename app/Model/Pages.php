<?php

namespace App\Model;


class Pages extends BaseModel
{
    protected $fillable = [
        'title', 'slug', 'open_in', 'page_type',
        'link', 'content', 'image', 'status', 'hint',
        'seo_desc', 'seo_keys', 'seo_title','parent_id'
    ];
}
