<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Testimonial extends BaseModel
{
    protected $table = 'testimonials';
    protected $fillable = ['testimonial_by','testimonial', 'image','designation','status','order'];


}
