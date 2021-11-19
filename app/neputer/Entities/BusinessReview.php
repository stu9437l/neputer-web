<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class BusinessReview extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'business_reviews';
    protected $fillable = [
                 'full_name','email','star','business_id','comment','status'
    ];

}
