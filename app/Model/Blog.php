<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Blog extends BaseModel
{
    protected $table = 'blogs';
    protected $fillable = ['title', 'blog_category_id', 'slug','image','description','status','seo_title','seo_description','seo_keywords', 'publish_date'];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function parent()
    {
        return $this->hasOne(self::class, 'id', 'parent_id');
    }
}
