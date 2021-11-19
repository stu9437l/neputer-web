<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Duration;

/**
 * Class DurationService
 * @package Neputer\Services
 */
class DurationService extends BaseService
{

    /**
     * The Duration instance
     *
     * @var $model
     */
    protected $model;

    /**
     * DurationService constructor.
     * @param Duration $duration
     */
    public function __construct(Duration $duration)
    {
        $this->model = $duration;
    }


    public function getData(Request $request)
    {
        $records = $this->model->select(['id', 'title','details'])
            ->get();

        return $records;
    }

    public function pluckDuration()
    {
        return $this->model->pluck('title','id');
    }

}
