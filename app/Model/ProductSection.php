<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductSection extends Model
{
    protected $table = 'product_section';
    protected $fillable = ['title', 'slug', 'rank', 'status'];
}
