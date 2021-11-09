<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $table = 'why_us';

   protected $fillable = [
     'title', 'description', 'images','priority'
   ];
}