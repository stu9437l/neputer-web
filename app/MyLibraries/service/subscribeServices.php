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

    public function byEmail( string $email )
    {
        return $this->model->whereEmail($email)->first();
    }

    public function exists( string $email )
    {
        return $this->model->whereEmail($email)->exists();
    }

}