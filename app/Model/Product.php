<?php

namespace App\Model;


use App\Model\Category;

class Product extends BaseModel
{
    protected $table = 'products';

    protected $fillable = [
        'category_id', 'title', 'slug', 'new_price', 'old_price', 'quantity', 'short_desc', 'long_desc',
        'main_image', 'status', 'user_id', 'rating', 'seo_title', 'seo_desc', 'seo_keywords'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function galleries(){
        return $this->hasMany(ProductGallery::class);
    }

    public function attributes(){
        return $this->belongsToMany(Attributes::class, 'product_attribute', 'product_id', 'attribute_id')
                ->withPivot('weight', 'new_price', 'old_price', 'remarks', 'rank');

    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

    public function productReviews(){
        return $this->hasMany(ProductReviews::class);
    }
}
