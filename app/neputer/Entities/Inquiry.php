<?php

namespace Neputer\Entities;

use Illuminate\Support\Facades\Auth;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Inquiry extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'inquiries';
    protected $fillable = [
        'name','email','contact','country','message','status'
    ];

    public function scopeByUser($query)
    {
        if (session('current_user_panel') == 'agent'){

            return $query->where('user_id',  Auth::id());
        }


    }

}
