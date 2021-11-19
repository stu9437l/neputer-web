<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class MenuSection extends Model
{

    protected $table = 'menu_section';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title','slug','hint',
    ];

    public function pages()
    {
        return $this->belongsToMany(
            Page::class,
            'menu_section_page',
            'menu_section_id',
            'page_id')
            ->withPivot('rank');
    }

}
