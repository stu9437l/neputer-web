<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Fact extends Model
{

    use HistoryTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by','updated_by','title','order_by','search','status'
    ];

}
