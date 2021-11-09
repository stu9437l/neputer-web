<?php


namespace App\Http\Controllers\Mail;


use App\Http\Controllers\Admin\BaseController;
use App\Mail\CareerMail;
use App\Model\CareerForm;
use Illuminate\Support\Facades\Mail;

class CareerMailController extends BaseController
{
    /**
     * @var Career
     */
    protected $model;


    public function __invoke($career_id)
    {
        $data = [];
        $this->model = new CareerForm();
        $data['row'] = $this->model->find($career_id);

        Mail::to($data['row']->email)->send(new CareerMail($data['row']));

        session()->flash('success-message','Success to send mail');
        return redirect('admin/enquiry_career/'.$career_id);

    }
}