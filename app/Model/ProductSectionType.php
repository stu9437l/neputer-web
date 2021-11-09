<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSectionType extends BaseModel
{
    protected $table = 'product_section_type';
    protected $fillable = ['title', 'slug', 'rank', 'product_section', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_section_type_product');
    }

}
