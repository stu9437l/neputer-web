<?php

namespace App;

use App\Model\Role;
use App\Model\UserDetails;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'status', 'verification_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the user details record associated with the user.
     */
    public function userDetail()
    {
        return $this->hasOne(UserDetails::class);
    }


    /**
     * The roles that belong to the user.
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function isDeletable()
    {
        if($this->email == 'root@laravelBroadwayTraining.local'){
            return false;
        }

        if($this->email == auth()->user()->email){
            return false;
        }

        return true;
    }


}
