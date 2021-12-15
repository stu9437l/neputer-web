<?php

namespace App\Model;

use ViewHelper;

class Slider extends BaseModel
{
    protected $fillable = [
        'image', 'alt_text', 'caption',
        'rank', 'status', 'caption_two'
    ];

    public function getImage()
    {
        return ViewHelper::getImagePath('sliders', $this->image);
    }

}
