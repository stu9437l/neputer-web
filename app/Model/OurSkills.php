<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class OurSkills extends BaseModel
{
    protected $table = 'our_skills';
    protected $fillable = ['title', 'description','order','status'];


}
