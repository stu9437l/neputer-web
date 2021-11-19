<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Representative extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='representatives';
    protected $fillable = [
        'name','contact','email','address','details','status','country','image'
    ];

    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->image)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }

}
