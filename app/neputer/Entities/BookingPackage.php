<?php

namespace Neputer\Entities;

use App\Helper\AppHelper;
use Illuminate\Support\Facades\Auth;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class BookingPackage extends Model
{
    use HistoryTrait;

    protected $table =  'booking_packages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'dob',
        'country',
        'passport_no',
        'passport_expire',
        'mailing_email',
        'phone',
        'package_id',
        'no_of_people',
        'arrival_date',
        'flight_name',
        'airport_pickup',
        'departure_date',
        'find_us',
        'additional_info',
        'status',
        'payment_proof'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function canDelete()
    {
        if (AppHelper::isDefaultCategory($this))
            return false;
        return true;
    }

    public function countChildCategories()
    {
        return Category::where('parent_id', $this->id)->count();
    }

    public function facts()
    {
        return $this->belongsToMany(Fact::class,'category_fact','category_id','fact_id')->withTimestamps();
    }


    public function scopeByUser($query)
    {

        if (session('current_user_panel') == 'agent'){

            return $query->where('user_id',  Auth::id());
        }


    }


}
