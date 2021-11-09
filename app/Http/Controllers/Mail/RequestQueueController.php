<?php


namespace App\Http\Controllers\Mail;


use App\Http\Controllers\Admin\BaseController;
use App\Mail\quoteMail;
use App\Model\RequestQuote;
use Illuminate\Support\Facades\Mail;

class RequestQueueController extends BaseController
{
    protected $model;

    public function __invoke($service_id)
    {
        $data = [];
        $this->model = new RequestQuote();
        $data['row'] = $this->model->find($service_id);

        Mail::to($data['row']->email)->send(new quoteMail($data['row']));

        session()->flash('success-message','Success to send mail');
        return redirect('admin/request_quote/'.$service_id);

    }
}