<?php

namespace App\Model;

use App\Model\BaseModel;
use Illuminate\Database\Eloquent\Model;

class ProductGallery extends BaseModel
{
    protected $table = 'product_gallery';
    protected $fillable = ['product_id','image','alt_text','rank', 'status'];
}
