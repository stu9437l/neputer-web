<?php

namespace App\Model;


class Order extends BaseModel
{
    protected $table = 'orders';
    protected $fillable = [
        'first_name', 'last_name', 'email', 'address', 'optional_address', 'phone', 'status', 'delivery_status',
    ];

    public function orderCarts()
    {
        return $this->hasMany(OrderCart::class);
    }
}
