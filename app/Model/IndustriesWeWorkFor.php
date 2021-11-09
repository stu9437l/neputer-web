<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class IndustriesWeWorkFor extends Model
{
     protected $table = 'industries_we_work_for';

     protected $fillable = [
         'image' , 'title', 'priority','status', 'link'
     ];
}