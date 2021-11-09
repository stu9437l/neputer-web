<?php


namespace App\MyLibraries\service;


use App\Model\Contact;

class contactServices
{
    /**
     * @var Contact
     */
    private $model;

    public function __construct()
   {
       $this->model = new Contact();
   }

    public function store(array $validated)
    {
       $this->model->create($validated);
    }


}