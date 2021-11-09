<?php


namespace App\MyLibraries\service;


use App\Model\IndustriesWeWorkFor;

class IndustriesWeWorkForService
{
    /**
     * @var IndustriesWeWorkFor
     */
    private $model;

    public function __construct()
    {
        $this->model = new IndustriesWeWorkFor();
    }

    public function getIndustries()
    {
       return $this->model->where('status',1)->orderBy('priority')->get();
    }

    public function store(array $allReqs)
    {
         $this->model->create($allReqs);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function getIndustriesHomePage($getSiteConfigByKey)
    {
        return $this->model->where('status' ,1)->limit($getSiteConfigByKey)->orderBy('priority')->get();
    }


}