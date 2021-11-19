<?php

namespace Neputer\Entities;

use App\Helper\AppHelper;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class PackageSearchTag extends Model
{
    use HistoryTrait;

    protected $table =  'package_search_tags';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'package_id',
        'tag',
    ];


    public function package()
    {
        return $this->belongsToMany(Package::class);
    }


}
