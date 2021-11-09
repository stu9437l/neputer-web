<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Portfolio extends BaseModel
{
    protected $table = 'portfolio';
    protected $fillable = ['title', 'portfolio_category_id', 'slug','image','description','status','seo_title','seo_description','seo_keywords'];

}
