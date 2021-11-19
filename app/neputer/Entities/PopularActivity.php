<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class PopularActivity extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'popular_activity';
    protected $fillable = [
        'activity_id','rank'
    ];

    public function activities()
    {
        return $this->belongsTo(Activity::class,'activity_id','id');
    }

}
