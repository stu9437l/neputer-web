<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class DevelopmentProcess extends Model
{
    protected $table = 'development_process';
   protected $fillable = [
     'image','title' ,'description','priority','status'
   ];
}