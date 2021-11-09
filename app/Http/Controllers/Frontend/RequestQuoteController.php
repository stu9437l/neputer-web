<?php


namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Admin\BaseController;
use App\Http\Requests\Request_a_quote\requestQueueValidation;
use App\Model\RequestQuote;
use App\Model\Service;
use App\MyLibraries\service\requestAQuoteService;
use App\MyLibraries\service\ServiceService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RequestQuoteController extends BaseController
{

    /**
     * @var Service
     */
    protected $model;
    protected $panel = 'Request a Quote Enquiry';
    protected $base_route = 'admin.request_quote';
    protected $view_path = 'admin.request_quote_enquiry';
    protected $requestQuoteService;
    protected $service;
    /**
     * @var ServiceService
     */
    protected $serviceService;

    /**
     *
     * @param requestAQuoteService $requestAQuoteService
     * @param ServiceService $serviceService
     */



    public function __construct(requestAQuoteService $requestAQuoteService, ServiceService $serviceService)
    {
       $this->requestQuoteService = $requestAQuoteService;
       $this->serviceService = $serviceService;
    }


    public function index(Request $request)
    {
        if($request->ajax())
        {
            $data = $this->service->where('title', 'like','%'.$request->get('q').'%')->get();
            if ($data->count() > 0) {
                foreach ($data as $datum) {
                    $response[] =  [
                        'id' => $datum->title,
                        'text' => $datum->title,
                    ];
                }
            }
            return response()->json([
                'body'=>$response,
            ], Response::HTTP_OK);
        }
        $data = [];
        $data['services'] = $this->serviceService->getServiceForSelect();
        return view('frontend.request-a-quote.index',compact('data'));
    }

    public function adminIndex(Request $request)
    {
        $data = [];
        $data['rows'] = $this->requestQuoteService->getAllRequestQuoteMessage($request);
        return view($this->loadDefaultViewPath($this->view_path.'.index'),compact('data'));
    }

    public function show($id)
    {
        $data = [];
        $data['request_quote'] = $this->requestQuoteService->find($id);
        if($data['request_quote'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/enquiry_request_quote');
        }

        $data['request_quote']->status = 1;
        $data['request_quote']->save();
        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    public function unseen($id)
    {
        $data = [];
        $data['request_quote'] = $this->requestQuoteService->find($id);
        if($data['request_quote'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/enquiry_request_quote');
        }

        $data['request_quote']->status = 0;
        $data['request_quote']->save();
        return redirect('admin/request_quote');
    }

    public function store(requestQueueValidation $request)
    {
        $this->requestQuoteService->create($request->validated());
        $request->session()->flash('success','Successfully Enquiry submitted');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $data = [];
        $data['row'] = $this->requestQuoteService->find($id);
        $data['row']->delete();

        session()->flash('success-message','Successfully Enquiry Deleted');
        return redirect()->back();
    }

}