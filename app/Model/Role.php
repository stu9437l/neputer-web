<?php

namespace App\Model;

use App\User;

class Role extends BaseModel
{
    protected $fillable = ['role', 'slug', 'hint', 'status'];


    /**
     * The user that belong to the user.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

}
