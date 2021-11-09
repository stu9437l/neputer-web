<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class CompanyStory extends BaseModel
{
    protected $table = 'company_story';
    protected $fillable = ['year', 'detail','status','order'];


}
