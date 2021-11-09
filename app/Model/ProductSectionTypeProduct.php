<?php

namespace App\Model;


class ProductSectionTypeProduct extends BaseModel
{
    protected $table = 'product_section_type_product';
    protected $fillable = ['product_section_type_id', 'product_id', 'rank'];
}
