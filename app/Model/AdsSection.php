<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AdsSection extends Model
{
    protected $table = 'ads_section';
    protected $fillable = ['title','slug','hint'];

    public function Ads()
    {
        return $this->belongsToMany(Ads::class,
            'ads_section_ads',
            'ad_section_id',
            'ad_id')
            ->withPivot('rank')
            ->withPivot('start_date')
            ->withPivot('end_date');

    }
}
