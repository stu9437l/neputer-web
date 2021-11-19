<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Testimonial;

/**
 * Class TestimonialService
 * @package Neputer\Services
 */
class TestimonialService extends BaseService
{

    /**
     * The Testimonial instance
     *
     * @var $model
     */
    protected $model;

    /**
     * TestimonialService constructor.
     * @param Testimonial $testimonial
     */
    public function __construct(Testimonial $testimonial)
    {
        $this->model = $testimonial;
    }

    public function getData(Request $request)
    {
        return $this->model->select('id','name','contact','email','address','status')->get();
    }

}
