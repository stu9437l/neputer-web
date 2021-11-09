<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\ServiceCustomerEnquiry\ServiceCustomerFormValidation;
use App\Model\ServiceCustomerEnquiry;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use function foo\func;

class ServiceFormController extends BaseController
{
    protected $model;
    protected $folder;
    protected $folder_path;
    protected $image_name = null;
    protected $panel = 'Service Customer Enquiry';
    protected $base_route = 'admin.service_enquiry';
    protected $view_path = 'admin.service_enquiry';
    /**
     * @var ServiceCustomerEnquiry
     */

    public function __construct()
    {
        $this->model = new ServiceCustomerEnquiry();
        $this->folder = config('myPath.assets.image_panel_folder.service_enquiry');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }

    /**
     * @param Request $request
     * @return Factory|Application|View
     */
    public function index(Request $request)
    {
       $data = [];
       $data['rows'] = $this->model->
        where(function ($query) use ($request){

            if($request->has('filter_name') && $request->get('filter_name')){
                $query->where('service_customer_enquiry.name','like','%'.$request->get('filter_name').'%');
            }

            if($request->has('filter_email') && $request->get('filter_email')){
                $query->where('service_customer_enquiry.email', 'like', '%'. $request->get('filter_email'). '%');
            }

            if($request->has('filter_message') && $request->get('filter_message')){
                $query->where('service_customer_enquiry.message', 'like', '%'.$request->get('filter_message').'%');
            }

            if($request->has('filter_created_at') && $request->get('filter_created_at')){
                $query->where('service_customer_enquiry.created_at', 'like', '%'.$request->get('filter_created_at').'%');
            }

           if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
               $query->where('service_customer_enquiry.status', $request->get('filter_status') == 'seen' ? 1 : 0);
           }

       })->latest()
       ->paginate(10);
       return view($this->loadDefaultViewPath($this->view_path.'.index'),compact('data'));
    }

    /**
     * @param $id
     * @return Factory|Application|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $data = [];
        $data['service'] = $this->model->find($id);
        if($data['service'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/service');
        }
        $data['service']->status = 1;
        $data['service']->save();
        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    /**
     * @param ServiceCustomerFormValidation $request
     * @return RedirectResponse
     */
    public function store(ServiceCustomerFormValidation $request)
    {
       $this->model->create($request->validated());
       session()->flash('success','Service Enquiry Submitted ');
       return redirect()->back();
    }

    public function unseen($id)
    {

        $data = [];
        $data['service'] = $this->model->find($id);
        if($data['service'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/service_enquiry');
        }

        $data['service']->status = 0;
        $data['service']->save();
        return redirect('admin/service_enquiry  ');
    }

    public function destroy(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }

        $this->image_name = $data['row']->image;
        parent::removeImage($this->image_name);

        $data['row']->delete();


        $request->session()->flash('success-message', $this->panel . ' deleted successfully.');
        return redirect()->route($this->base_route . '.index');
    }

    protected function delete($row)
    {
        if (!$row) {
            session()->flash('error-message', $this->panel . ' Unable to Delete');
            return false;
        }

        parent::removeImage($row->image);

        $row->delete();
        session()->flash('success-message', $this->panel . ' deleted successfully.');
        return true;
    }

}