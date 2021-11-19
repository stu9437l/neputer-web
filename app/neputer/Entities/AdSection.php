<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class AdSection extends Model
{
    use HistoryTrait;

    protected $table = 'ad_placements';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'section','advertisement_id','start_date','end_date','start_time','end_time','rank','created_by','updated_by','status'
    ];

}
