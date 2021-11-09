<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ads extends Model
{
    protected $table = 'ads';
    protected $fillable = ['ad_type','title','content', 'banner', 'status','hint'];
}
