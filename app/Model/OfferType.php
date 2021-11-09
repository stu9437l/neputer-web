<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfferType extends BaseModel
{
    protected $table = 'offer_type';
    protected $fillable = ['title', 'slug', 'rank', 'offer_section', 'status'];

    public function products()
    {
        return $this->belongsToMany(Product::class,
            'offer_type_product',
            'offer_type_id',
            'product_id')
            ->withPivot('rank');
    }

}
