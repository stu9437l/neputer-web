<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ProductReviews extends BaseModel
{
    protected $table = 'product_review';
    protected $fillable = ['product_id', 'rating', 'name', 'email', 'comment'];
}
