<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Subscriber extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'subscribers';
    protected $fillable = [
        'email'
    ];

}
