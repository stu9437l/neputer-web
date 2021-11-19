<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Representative;

/**
 * Class RepresentativeService
 * @package Neputer\Services
 */
class RepresentativeService extends BaseService
{

    /**
     * The Representative instance
     *
     * @var $model
     */
    protected $model;

    /**
     * RepresentativeService constructor.
     * @param Representative $testimonial
     */
    public function __construct(Representative $testimonial)
    {
        $this->model = $testimonial;
    }

    public function getData(Request $request)
    {
        return $this->model->select('id','name','contact','email','country','address','status')->get();
    }

}
