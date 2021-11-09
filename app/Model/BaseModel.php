<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function scopeStatus($query)
    {
        return $query->where('status', 1);
    }

    public function scopeOrderByRankAsc($query)
    {
        return $query->orderBy('rank', 'asc');
    }

    public function scopeOrderByRankDesc($query)
    {
        return $query->orderBy('rank', 'desc');
    }


    public function scopeOrderByTitleAsc($query)
    {
        return $query->orderBy('title', 'asc');
    }

    public function scopeOrderByTitleDesc($query)
    {
        return $query->orderBy('title', 'desc');
    }


}
