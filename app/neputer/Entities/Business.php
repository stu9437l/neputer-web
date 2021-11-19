<?php

namespace Neputer\Entities;

use App\User;
use Neputer\Entities\BaseModel as Model;

class Business extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'business_name',
        'slug',
        'user_id',
        'type',
        'email',
        'image',
        'phone',
        'status',
        'zip_code',
        'website',
        'address',
        'country',
        'city',
        'details',
    ];

    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->image)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }
    public function user()
    {
            return $this->hasOne(User::class);
    }

    public function packages()
    {
        return $this->hasMany(Package::class);
    }


}
