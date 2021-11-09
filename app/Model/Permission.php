<?php

namespace App\Model;

class Permission extends BaseModel
{
    protected $table = "permission";
    protected $fillable = ['panel_id', 'action_id', 'rank'];


    protected function rolesAssign()
    {
        return $this->belongsToMany(RoleAssign::class);
    }
}
