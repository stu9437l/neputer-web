<?php


namespace App\Model;


use Illuminate\Database\Eloquent\Model;

class CareerForm extends Model
{
    protected $table = 'career_forms';

     protected $fillable = [
         'name','email','phone','need','message','status','image'
     ];
}