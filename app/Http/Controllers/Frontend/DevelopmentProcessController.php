<?php


namespace App\Http\Controllers\Frontend;


use App\Facades\AppHelperFacade;
use App\Http\Controllers\Admin\BaseController;
use App\MyLibraries\service\DevelopmentProcessService;

class DevelopmentProcessController extends BaseController
{
    protected $view_path = 'frontend.development-process';
    protected $developmentServiceProcess;

    public function __construct(DevelopmentProcessService $developmentProcessService)
    {
      $this->developmentServiceProcess = $developmentProcessService;
    }

    public function index()
    {
        $data = [];

        $data['development-process'] = $this->developmentServiceProcess->getDevelopmentProcecss();
        return view($this->view_path . '.index',compact('data'));
    }


}