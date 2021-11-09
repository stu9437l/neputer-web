<?php


namespace App\MyLibraries\service;


use App\Model\RequestQuote;
use App\Model\Service;
use Illuminate\Http\Response;
use \Illuminate\Http\Request;

class requestAQuoteService
{

    /**
     * @var RequestQuote
     */
    protected $model;
    protected $service;

    public function __construct()
    {
        $this->model = new RequestQuote();
        $this->service = new Service();
    }


    public function getAllRequestQuoteMessage(Request $request)
    {
        return  $this->model
            ->where(function ($query) use ($request) {
                if($request->has('filter_name') && $request->get('filter_name')){
                    $query->where('request_a_quote.name','like','%'.$request->get('filter_name').'%');
                }

                if($request->has('filter_email') && $request->get('filter_email')){
                    $query->where('request_a_quote.email', 'like', '%'. $request->get('filter_email'). '%');
                }

                if($request->has('filter_message') && $request->get('filter_message')){
                    $query->where('request_a_quote.message', 'like', '%'.$request->get('filter_message').'%');
                }

                if($request->has('filter_created_at') && $request->get('filter_created_at')){
                    $query->where('request_a_quote.created_at', 'like', '%'.$request->get('filter_created_at').'%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('request_a_quote.status', $request->get('filter_status') == 'seen' ? 1 : 0);
                }

            })
            ->latest()
            ->paginate(10);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function create(array $validated)
    {
        $this->model->create($validated);
    }


}