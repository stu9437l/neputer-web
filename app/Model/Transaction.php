<?php

namespace App\Model;


class Transaction extends BaseModel
{
    protected $table = 'transactions';
    protected $fillable = [
        'code', 'billing_info', 'shipping_info', 'user_id', 'total', 'payment_gateway', 'payment_token', 'status', 'admin_message'
    ];

}
