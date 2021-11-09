<?php

namespace App\Model;

class PermissionActive extends BaseModel
{
    protected $table = 'permission_active';
    protected $fillable = ['permission_id', 'role_id'];

}
