<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Grade extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'grades';
    protected $fillable = [
        'title','details'
    ];

}
