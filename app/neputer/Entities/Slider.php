<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Slider extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'img_text','image','link','status','alt_text'
    ];


    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }
        return config('neputer.default-image');
    }

    public function getResizeImage($folder_name)
    {

        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR .$this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . '1080_720_'.$this->image);
        }
        return config('neputer.default-image');

    }


}
