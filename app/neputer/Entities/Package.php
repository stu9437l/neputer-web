<?php

namespace Neputer\Entities;

use Illuminate\Support\Facades\Auth;
use Neputer\Entities\BaseModel as Model;

class Package extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slug',
        'business_id',
        'destination_id',
        'duration_id',
        'grade_id',
        'image',
        'activity_id',
        'available_seat',
        'price',
        'views_count',
        'cost_includes',
        'cost_excludes',
        'description',
        'highlight',
        'seo_title',
        'seo_keywords',
        'seo_description',
        'top_facts',
        'avg_star',
        'video_url',
        'status',
        'tags',
        'trek_route_image',
        'trek_route_map',
        'min_seat_available',
        'max_seat_available',
        'package_type'
    ];

    protected $casts = [
        'top_facts' => 'array',
    ];


    public function getImage($folder_name,$image_name =null)
    {
        if ($image_name){
            $image = $image_name;
        }
        else{
            $image = $this->image;
        }

        if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $image)) {

            if ($image){
                return asset('assets/admin/images/' . $folder_name . '/' . $image);
            }else{
                return config('neputer.default-image');
            }


        }

        return config('neputer.default-image');
    }
    public function getTrekMap($folder_name)
    {

        if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->trek_route_image)) {

            if ($this->image){

                return asset('assets/admin/images/' . $folder_name . '/' . $this->trek_route_image);
            }else{
                return config('neputer.default-image');
            }


        }

        return config('neputer.default-image');
    }

    public function getThumbsImage($folder_name)
    {
        if (file_exists(public_path() . DIRECTORY_SEPARATOR . 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . '380_276_' . $this->image)) {
            return asset('assets/admin/images/' . $folder_name . '/' . '380_276_'.$this->image);
        }

        return config('neputer.default-image');
    }

    public function scopeByUser($query)
    {
        if (session('current_user_panel') == 'agent') {

            return $query->where('user_id', Auth::id());
        }


    }

    public function package_galleries()
    {
        return $this->hasMany(PackageGallery::class);
    }

    public function package_gallery()
    {
        return $this->hasMany(PackageGallery::class);
    }

    public function destination()
    {
        return $this->belongsTo(Destination::class);
    }
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }
    public function duration()
    {
        return $this->belongsTo(Duration::class);
    }
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    public function business()
    {
        return $this->belongsTo(Business::class);
    }

}
