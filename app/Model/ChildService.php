<?php

namespace App\Model;

use App\Model\BaseModel;
use App\Model\Product;


class ChildService extends BaseModel
{
    protected $table = 'child_service';
    protected $fillable = ['title', 'image', 'description','status','order','service_id'];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
