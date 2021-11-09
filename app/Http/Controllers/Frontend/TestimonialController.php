<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Admin\BaseController;
use App\MyLibraries\service\ClientTestimonial;

class TestimonialController extends BaseController
{
    /**
     * @var ClientTestimonial
     */
    protected $clientTestimonial;

    public function __construct(ClientTestimonial $clientTestimonial)
    {
        $this->clientTestimonial = $clientTestimonial;
    }

    public function index()
    {
        $data = [];
        $data['client-review'] = $this->clientTestimonial->getAllTestimonial();
        return view('frontend.client-review.index',compact('data'));
    }
}