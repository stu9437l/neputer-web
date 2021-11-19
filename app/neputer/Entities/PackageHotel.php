<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class PackageHotel extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'package_hotel';
    protected $fillable = [
        'name','package_id','kilometer','website','order'
    ];

}
