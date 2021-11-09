<?php


namespace App\Http\Controllers\Frontend;


use App\Http\Controllers\Admin\BaseController;
use App\MyLibraries\service\AboutUsService;
use App\MyLibraries\service\WhyUsService;

class AboutUsController extends BaseController
{

    /**
     * @var WhyUsService
     */
    protected $whyUsService;
    protected $aboutUsService;

    public function __construct(
        WhyUsService $whyUsService,
       AboutUsService $aboutUsService
    )
   {
     $this->whyUsService = $whyUsService;
     $this->aboutUsService = $aboutUsService;
   }

    public function index()
    {
        $data['why-choose-us'] = $this->whyUsService->getWhyUsSection();
        $data['about-us'] = $this->aboutUsService->getAboutUs();

        return view('frontend.about-us.index', compact('data'));
    }

}