<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class BlogCategory extends BaseModel
{
    protected $table = 'blog_category';
    protected $fillable = ['title', 'slug','image','description','status','seo_title','seo_description','seo_keywords', 'order'];

}
