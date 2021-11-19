<?php

namespace Neputer\Entities;

use Illuminate\Support\Facades\Auth;
use Neputer\Entities\BaseModel as Model;

class PackageReview extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'package_reviews';
    protected $fillable = [
        'full_name','email','star','package_id','comment','status'
    ];


    public function scopeByUser($query)
    {

        if (session('current_user_panel') == 'agent'){

            return $query->where('user_id',  Auth::id());
        }


    }
}
