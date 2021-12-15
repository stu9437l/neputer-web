<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ContactUs\ContactUsValidation;
use App\Model\Contact;
use App\MyLibraries\service\contactServices;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

class ContactUsController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.contact';
    protected $view_path = 'admin.contact';
    protected $panel = 'Contact';
    protected $contactService;
    /**
     * @var contactServices
     */


    public function __construct(contactServices $contactServices)
    {
        $this->model = new Contact();
        $this->contactService = $contactServices;
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->model
            ->select('id', 'name', 'email', 'created_at', 'updated_at', 'status')
            ->where(function ($query) use ($request) {

                if ($request->has('filter_name') && $request->get('filter_name')) {
                    $query->where('name', 'like', '%' . $request->get('filter_name') . '%');
                }

                if ($request->has('filter_email') && $request->get('filter_email')) {
                    $query->where('email', 'like', '%' . $request->get('filter_email') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('status', $request->get('filter_status') == 'active' ? 1 : 0);
                }


            })
            ->paginate(10);

        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    /**
     * @param Contact $contact
     * @return Factory|Application|View
     */
    public function show($id)
    {
        $data = [];
        $data['contact'] = $this->model->find($id);
        if($data['contact'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/contact');
        }
        $data['contact']->status = 1;
        $data['contact']->save();
        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    public function store(ContactUsValidation $request)
    {
       if($request->validated())
       {
           $request->session()->flash('success', 'Message sent successfully. Stay in touch !');
           $this->contactService->store($request->validated());
           return redirect()->back();
       }
        $request->session()->flash('error', 'Unable to Contact-us');
        return redirect()->back();

    }
}
