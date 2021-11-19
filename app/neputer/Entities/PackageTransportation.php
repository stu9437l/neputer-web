<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class PackageTransportation extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'package_transportation';
    protected $fillable = [
        'name','price','package_id'
    ];

}
