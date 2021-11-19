<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Page extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','slug','open_in','page_type','link','content','page_image','status','hint','seo_title','seo_desc','seo_keywords'
    ];

}
