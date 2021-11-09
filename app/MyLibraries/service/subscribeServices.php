<?php


namespace App\MyLibraries\service;


use App\Model\Subscribe;

class subscribeServices
{
    /**
     * @var Subscribe
     */
    private $model;

    public function __construct()
    {
        $this->model = new Subscribe();
    }

    public function store(array $validated)
    {
        $this->model->create($validated);
    }


}