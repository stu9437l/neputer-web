<?php

namespace App\Model;


class Slider extends BaseModel
{
    protected $fillable = ['image', 'alt_text', 'caption', 'rank', 'status', 'caption_two'];
}
