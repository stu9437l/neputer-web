<?php


namespace App\Http\Controllers\Admin;


use \Illuminate\Http\Request;
use App\MyLibraries\service\subscribeServices;
use App\Http\Requests\Subscribe\subscribeFormValidation;

class SubscribeController extends BaseController
{

    protected $subscribeService;

    public function __construct(subscribeServices $subscribeService)
    {
        $this->subscribeService = $subscribeService;
    }

    public function store(subscribeFormValidation  $request)
    {
        if (!$this->subscribeService->exists($request->email)) {
            $this->subscribeService->store($request->validated());
        }
        else{
            $request->session()->flash('success', 'Your email is already exists!');
            return redirect()->back();
        }

       $request->session()->flash('success', 'You have subscribed successfully!');
       return redirect()->back();
    }

}