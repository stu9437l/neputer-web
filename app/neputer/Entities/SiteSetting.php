<?php

namespace Neputer\Entities;

use App\User;
use Neputer\Entities\BaseModel as Model;
use Neputer\Traits\HistoryTrait;

class SiteSetting extends Model
{

    use HistoryTrait;

    protected $table = 'site_settings';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'key','value','updated_by'
    ];

    public function getImage($folder_name)
    {
        if (file_exists(public_path().DIRECTORY_SEPARATOR. 'assets' . DIRECTORY_SEPARATOR . 'admin' . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $folder_name . DIRECTORY_SEPARATOR . $this->photo)) {
            return asset('assets/admin/images/' . $folder_name . '/' . $this->image);
        }

        return config('neputer.default-image');
    }
}
