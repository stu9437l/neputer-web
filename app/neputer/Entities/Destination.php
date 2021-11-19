<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Destination extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'destinations';
    protected $fillable = [
        'title','description','status','slug','image','seo_title','seo_keywords','seo_description'
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }


    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }
    public function getBannerImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . '790_445_'.$this->image);
        }

        return config('neputer.default-image');
    }

}
