<?php


namespace App\Http\Controllers\Frontend;


use App\Facades\AppHelperFacade;
use App\Http\Controllers\Admin\BaseController;
use App\MyLibraries\service\AboutUsService;
use App\MyLibraries\service\clientService;
use App\MyLibraries\service\ClientTestimonial;
use App\MyLibraries\service\IndustriesWeWorkForService;
use App\MyLibraries\service\OurWorkService;
use App\MyLibraries\service\ServiceService;
use App\MyLibraries\service\SliderService;

class HomeController extends BaseController
{

    const DEFAULT_PAGINATION_LIMIT = 5;

    /**
     * @var SliderService
     */
    protected $sliderService;
    protected $aboutUsService;
    protected $serviceService;
    protected $clientService;
    protected $ourWorkService;
    protected $clientTestimonial;
    protected $industriesWeWorkForService;


    public function __construct(
         SliderService $sliderService,
         AboutUsService $aboutUsService,
        ServiceService $serviceService,
        clientService $clientService,
        OurWorkService $ourWorkService,
        IndustriesWeWorkForService $industriesWeWorkForService,
        ClientTestimonial $clientTestimonial
    )
    {
       $this->sliderService = $sliderService;
       $this->aboutUsService = $aboutUsService;
       $this->serviceService = $serviceService;
       $this->clientService = $clientService;
       $this->ourWorkService = $ourWorkService;
       $this->industriesWeWorkForService = $industriesWeWorkForService;
       $this->clientTestimonial = $clientTestimonial;
    }

    public function index()
    {
        $data = [];
        $data['slider']   = $this->sliderService->getSlider(AppHelperFacade::getSiteConfigByKey('slider_limit') ?? self::DEFAULT_PAGINATION_LIMIT);
        $data['about-us'] = $this->aboutUsService->getAboutUs();
        $data['services'] = $this->serviceService->getService(AppHelperFacade::getSiteConfigByKey('service_limit'));
        $data['clients']  = $this->clientService->getClients(AppHelperFacade::getSiteConfigByKey('client_limit'));
        $data['our-works'] = $this->ourWorkService->getOurWorkInHomePage(AppHelperFacade::getSiteConfigByKey('our_work'));
        $data['industries'] = $this->industriesWeWorkForService->getIndustriesHomePage(AppHelperFacade::getSiteConfigByKey('industries_limit'));
        $data['testimonial'] = $this->clientTestimonial->getClientTestimonial(AppHelperFacade::getSiteConfigByKey('testimonial_limit'));
        return view('frontend.home.index', compact('data'));
    }

}