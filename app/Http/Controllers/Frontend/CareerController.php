<?php


namespace App\Http\Controllers\Frontend;


use App\Facades\AppHelperFacade;
use App\MyLibraries\service\careerService;
use App\MyLibraries\service\clientService;
use App\MyLibraries\service\ServiceService;

class CareerController
{
    /**
     * @var careerService
     */
    protected $careerService;
    protected $serviceService;
    protected $clientService;

    public function __construct(careerService $careerService,clientService $clientService)
    {
        $this->careerService = $careerService;
        $this->clientService = $clientService;
    }

    public function index()
    {
        $data = [];
        $data['client'] = $this->clientService->getClients(AppHelperFacade::getSiteConfigByKey('client_limit_careerPage'));
        $data['career'] = $this->careerService->getCareerFrontend(AppHelperFacade::getSiteConfigByKey('career_limit'));
        return view('frontend.career.index', compact('data'));
    }
}