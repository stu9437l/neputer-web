<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Destination;

/**
 * Class DestinationService
 * @package Neputer\Services
 */
class DestinationService extends BaseService
{

    /**
     * The Destination instance
     *
     * @var $model
     */
    protected $model;


    /**
     * DestinationService constructor.
     * @param Destination $destination
     */
    public function __construct(Destination $destination)
    {
        $this->model = $destination;
    }

    public function getData(Request $request)
    {
        $records = $this->model->select(['id', 'title','description', 'status'])
            ->get();

        return $records;
    }
    public function pluckDestination()
    {
        return $this->model->pluck('title','id');
    }

    public function getDestination($slug)
    {
        $record = $this->model->with(['activities' => function($query) {
            $query->take(6);
        }])->where('slug',$slug)->first();


        return $record;
    }

}
