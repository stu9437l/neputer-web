<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MenuSection extends BaseModel
{
    protected $fillable = ['title', 'slug', 'hint'];

    public function pages(){
        return $this->belongsToMany(
            Pages::class,
            'menu_section_page',
            'menu_section_id',
            'page_id')
            ->withPivot('rank');
    }
}
