<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\BaseController;
use App\MyLibraries\service\OurTeamServices;

class OurTeamController extends BaseController
{
    /**
     * @var OurTeamServices
     */
    private $ourTeamService;

    public function __construct(OurTeamServices $ourTeamServices)
     {
         $this->ourTeamService = $ourTeamServices;
     }

    public function index()
    {
        $data = [];
        $data['team-member'] = $this->ourTeamService->ourTeam();
        return view('frontend/our-team/index',compact('data'));
     }
}