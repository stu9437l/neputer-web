<?php

namespace App\Model;

class Attributes extends BaseModel
{
    protected $fillable =['group_id','title','slug','status'];
    protected $table = 'attributes';
    public function Group()
    {
        return $this->hasMany(Group::class);
    }
}
