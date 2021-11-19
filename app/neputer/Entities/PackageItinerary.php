<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class PackageItinerary extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'package_itinerary';
    protected $fillable = [
        'title','package_id','details','sub_title'
    ];

}
