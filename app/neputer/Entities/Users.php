<?php

namespace Neputer\Entities;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Neputer\Utils\Acl\Entities\Role;

class Users extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'is_salary_based_writer', 'picked_limit', 'first_name', 'middle_name',
        'last_name', 'address', 'photo', 'note', 'phone',
    ];

    /**
     * @param $value
     */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) {
            $this->attributes['password'] = bcrypt($value);
        }
    }

    public function isDeleteable()
    {
        if ($this->email == 'root@ecelebrity.com') {
            return false;
        }

        if ($this->email == auth()->user()->email) {
            return false;
        }

        return true;
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->photo);
        }

        return config('neputer.default-image');
    }
}
