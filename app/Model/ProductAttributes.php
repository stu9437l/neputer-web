<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductAttributes extends Model
{
    protected $table = 'product_attribute';
    protected $fillable = ['product_id', 'attribute_id', 'value', 'rank'];

}
