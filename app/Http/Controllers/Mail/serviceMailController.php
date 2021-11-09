<?php


namespace App\Http\Controllers\Mail;


use App\Http\Controllers\Admin\BaseController;
use App\Mail\serviceMail;
use App\Model\ServiceCustomerEnquiry;
use Illuminate\Support\Facades\Mail;

class serviceMailController extends BaseController
{

    /**
     * @var ServiceCustomerEnquiry
     */
    protected $model;

    public function __invoke($service_id)
    {
        $data = [];
        $this->model = new ServiceCustomerEnquiry();
        $data['row'] = $this->model->find($service_id);

        Mail::to($data['row']->email)->send(new serviceMail($data['row']));

        session()->flash('success-message','Success to send mail');
        return redirect('admin/service_enquiry/'.$service_id);

    }

}