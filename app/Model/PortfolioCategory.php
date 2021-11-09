<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class PortfolioCategory extends BaseModel
{
    protected $table = 'portfolio_category';
    protected $fillable = ['title', 'slug','image','description','status','seo_title','seo_description','seo_keywords'];


}
