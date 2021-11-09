<?php


namespace App\MyLibraries\service;


use App\Model\About;

class AboutUsService
{
    /**
     * @var About
     */
    protected $model;

    public function __construct()
   {
       $this->model = new About();
   }

    public function getAboutUs()
    {
        return $this->model->where('order',1)->where('status',1)->first();
    }


}