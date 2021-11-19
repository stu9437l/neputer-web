<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Duration extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'durations';
    protected $fillable = [
        'title','details',
    ];

}
