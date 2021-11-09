<?php


namespace App\MyLibraries\service;


use App\Model\OurTeam;

class OurTeamServices
{

    /**
     * @var OurTeam
     */
    private $model;

    public function __construct()
    {
        $this->model = new OurTeam();
    }

    public function ourTeam()
    {
        return $this->model->orderBy('priority')->get();
    }
}