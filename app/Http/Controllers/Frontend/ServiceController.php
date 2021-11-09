<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Admin\BaseController;
use App\Model\Service;
use App\MyLibraries\service\ServiceService;

class ServiceController extends BaseController
{
    /**
     * @var Service
     */
    private $serviceService;

    public function __construct( ServiceService $serviceService)
  {
      $this->serviceService = $serviceService;
  }

    public function index()
    {
        $service = $this->serviceService->getFrontendServices();
        return view('frontend.service.index',compact('service'));
    }

    public function show($slug)
    {
        $data =[];
        $data['service'] = $this->serviceService->getServiceDetail($slug);
        if($data['service'] == null)
        {
            return  redirect('/service');
        }
       return view('frontend.service.detail',compact('data'));
    }
}