<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class PackageGallery extends Model
{
    use HistoryTrait;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'package_gallery';
    protected $fillable = [
        'name','package_id','image','alt_text','status'
    ];


    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }

    public function getThumbsImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR .$this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' .'380_276_'. $this->image);
        }

        return config('neputer.default-image');
    }

}
