<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfferTypeProduct extends BaseModel
{

    protected $table = 'offer_type_product';
    protected $fillable = ['offer_type_id', 'product_id', 'rank'];

}
