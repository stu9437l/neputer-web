<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class ServiceCustomerEnquiry extends Model
{
    protected $table = 'service_enquiry';

    protected $fillable = [
        'name','email','phone','topic','message','status','image'
    ];
}