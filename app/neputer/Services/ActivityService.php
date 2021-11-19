<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Activity;

/**
 * Class ActivityService
 * @package Neputer\Services
 */
class ActivityService extends BaseService
{

    /**
     * The Activity instance
     *
     * @var $model
     */
    protected $model;

    /**
     * ActivityService constructor.
     * @param Activity $activity
     */
    public function __construct(Activity $activity)
    {
        $this->model = $activity;
    }

    public function getData(Request $request)
    {
        $records = $this->model->select(['id', 'title','details'])
            ->get();

        return $records;
    }

    public function pluckActivity()
    {
        return $this->model->pluck('title','id');
    }

    public function getActivity($slug)
    {
        $record = $this->model->with(['packages' => function($query) {
            $query->take(6);
        },'packages.package_gallery' => function ($query) {
            $query->first();
        },'destination'])->where('slug',$slug)->first();
        return $record;
    }

}
