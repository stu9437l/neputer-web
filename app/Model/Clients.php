<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class Clients extends BaseModel
{
    protected $table = 'clients';
    protected $fillable = ['title', 'image','link','description','status','order'];


}
