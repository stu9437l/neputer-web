<?php

namespace Neputer\Entities;

use Neputer\Entities\BaseModel as Model;

class Testimonial extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table ='testimonials';
    protected $fillable = [
        'name','contact','email','address','details','status','image'
    ];

    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }

}
