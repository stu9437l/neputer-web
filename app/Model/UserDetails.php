<?php

namespace App\Model;

class UserDetails extends BaseModel
{
    protected $table = 'user_details';

    protected $fillable = [
        'user_id', 'first_name', 'middle_name', 'last_name', 'gender', 'profile_image',
    ];
}
