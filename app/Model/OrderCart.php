<?php

namespace App\Model;


class OrderCart extends BaseModel
{
    protected $table = 'order_carts';
    protected $fillable = [
        'order_id', 'product_id', 'product_name', 'qty', 'weight', 'unit_price', 'total_price',
    ];
}
