<?php


namespace App\MyLibraries\service;


use App\Model\Clients;

class clientService
{

    /**
     * @var Clients
     */
    protected $model;

    public function __construct()
     {
         $this->model = new Clients();
     }

    public function getClients($limit)
    {
        return $this->model->where('status',1)->limit($limit)->orderBy('order')->get();
    }


}