<?php

namespace Neputer\Entities;

use App\Helper\AppHelper;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class Category extends Model
{
    use HistoryTrait;

    protected $table =  'category';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_by','updated_by','parent_id','title','slug','detail','status','order_by','section_order_by',
        'seo_title','seo_keywords','seo_description'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = str_slug($value);
    }

    public function canDelete()
    {
        if (AppHelper::isDefaultCategory($this))
            return false;
        return true;
    }

    public function countChildCategories()
    {
        return Category::where('parent_id', $this->id)->count();
    }

    public function facts()
    {
        return $this->belongsToMany(Fact::class,'category_fact','category_id','fact_id')->withTimestamps();
    }


}
