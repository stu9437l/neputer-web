<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class TopicFact extends Model
{

    protected $table = 'fact_topic';

//    protected $casts = [
//
//    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by', 'updated_by', 'facts_id' ,'topics_id' ,'value', 'order_by', 'search', 'status'
    ];

}
