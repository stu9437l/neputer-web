<?php


namespace App\MyLibraries\service;


use App\Model\Service;

class ServiceService
{

    /**
     * @var Service
     */
    protected $model;

    public function __construct()
    {
        $this->model = new Service();
    }

    public function getService($limit)
    {
        return $this->model->where('status',1)->orderBy('order')->limit($limit)->get();
    }

    public function getFrontendServices()
    {
        return $this->model
            ->select('id','title', 'description', 'image', 'order','slug')
            ->where('status', 1)
            ->orderBy('order')
            ->get();
    }

    public function getServiceDetail($slug)
    {
        return $this->model
            ->where('slug',$slug)
            ->where('status',1)
            ->first();
    }

    public function getServiceForSelect()
    {
        return $this->model->pluck('title','id');
    }

}