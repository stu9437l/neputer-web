<?php

namespace Neputer\Entities;

use Illuminate\Support\Facades\Auth;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class ContactUs extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'contact_us';
    protected $fillable = [
        'name','email','contact','address','message','status'
    ];


}
