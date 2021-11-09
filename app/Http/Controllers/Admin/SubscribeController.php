<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\Subscribe\subscribeFormValidation;
use App\MyLibraries\service\subscribeServices;
use \Illuminate\Http\Request;

class SubscribeController extends BaseController
{

    protected $subscribeService;

    public function __construct(subscribeServices $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }

    public function store(subscribeFormValidation  $request)
    {
       $this->subscribeService->store($request->validated());

       $request->session()->flash('success','Subscribe Success');
       return redirect()->back();
    }

}