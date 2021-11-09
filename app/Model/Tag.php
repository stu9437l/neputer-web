<?php

namespace App\Model;


class Tag extends BaseModel
{
  protected $fillable = ['title', 'slug', 'status',
    'seo_title', 'seo_desc', 'seo_keywords'];
}
