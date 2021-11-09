<?php


namespace App\MyLibraries\service;


use App\Model\Testimonial;

class ClientTestimonial
{

    protected $model;

    public function __construct()
    {
        $this->model = new Testimonial();
    }

    public function getClientTestimonial($limit)
    {
       return $this->model->where('status',1)->limit($limit)->orderBy('order')->get();
    }

    public function getAllTestimonial()
    {
        return $this->model->where('status',1)->orderBy('order')->get();
    }

}