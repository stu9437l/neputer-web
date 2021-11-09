<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class OurWork extends Model
{

    protected $fillable = [
        'name', 'priority', 'description' ,'images','status','platform'
    ];

}