<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class RequestQuote extends Model
{
    protected $table = 'request_a_quote';

    protected $fillable = [
        'name', 'message', 'email', 'phone', 'service', 'status'
    ];
}