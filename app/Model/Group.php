<?php

namespace App\Model;


class Group extends BaseModel
{

    protected $fillable =['title','slug','status'];
    protected $table = 'groups';

    public function attributes()
    {

        return $this->hasMany(Attributes::class);
    }
}
