<?php


namespace App\MyLibraries\service;


use App\Model\Slider;

class SliderService
{
    /**
     * @var Slider
     */
    private $model;

    public function __construct()
   {
       $this->model = new Slider();
   }

    public function getSlider($limit)
    {
        return $this->model->select('id','caption','alt_text','image','rank')->where('status',1)->orderBy('rank')->limit($limit)->get();
    }

    public function first()
    {
        return $this->model->select('id','caption','alt_text', 'caption_two','image','rank')->where('status',1)->first();
    }

}