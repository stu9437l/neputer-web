<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfferSection extends Model
{
    protected $table = 'offer_section';
    protected $fillable = ['title', 'slug'];
}
