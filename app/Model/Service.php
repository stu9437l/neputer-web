<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Service extends BaseModel
{
    protected $table = 'services';
    protected $fillable = [
        'title', 'slug','image','description','status','seo_title',
        'seo_desc','seo_keywords', 'order', 'expertise_title',
        'expertise_detail','highlight_description','service_description'
    ];


}
