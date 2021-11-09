<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Category extends BaseModel
{
    protected $table = 'categories';
    protected $fillable = ['title', 'parent_id', 'slug','banner','description','status','seo_title','seo_desc','seo_keywords', 'pcount'];

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
