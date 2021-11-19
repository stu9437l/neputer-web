<?php

namespace Neputer\Entities;


use Illuminate\Database\Eloquent\Model;

class History extends Model
{

    protected $fillable = ['id', 'historyable_id', 'historyable_type', 'meta'];

    protected $casts = [
        'meta' => 'array',
    ];

    protected $appends = [
        'created_by',
        'last_created_at',
        'last_changed_data'
    ];

    public function getCreatedByAttribute()
    {
        return $this->meta['created_by'] ?? null;
    }

    public function getLastCreatedAtAttribute()
    {
        return $this->meta['last_created_at'] ?? null;
    }

    public function getLastChangedDataAttribute()
    {
        return $this->meta['last_changed_data'] ?? null;
    }

    public function historyable()
    {
        return $this->morphTo();
    }

}