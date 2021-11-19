<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Ads extends Model
{
    use HistoryTrait;

    protected $table = 'ads';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'ad_type',
        'content',
        'link',
        'open_in',
        'status',
        'created_by',
        'updated_by'
    ];

}
