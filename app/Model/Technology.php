<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Technology extends BaseModel
{
    protected $table = 'technologies';
    protected $fillable = ['title', 'icon','description','status'];


}
