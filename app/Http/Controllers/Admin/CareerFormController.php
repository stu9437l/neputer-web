<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\Career\AddCareerFormValidation;
use App\Model\CareerForm;
use App\MyLibraries\service\careerService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CareerFormController extends BaseController
{

    /**
     * @var careerService
     */
    protected $model;
    protected $folder;
    protected $file_name;
    protected $image_name = null;
    protected $panel = 'Career Customer Enquiry';
    protected $base_route = 'admin.enquiry_career';
    protected $view_path = 'admin.careers_enquiry';
    protected $careerService;
    protected $folder_path;

    public function __construct(careerService $careerService)
    {
        $this->careerService = $careerService;
        $this->model = new CareerForm();
        $this->folder = config('myPath.assets.image_panel_folder.careers_enquiry');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }


    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->careerService->getAllCareerMessage($request);
        return view($this->loadDefaultViewPath($this->view_path.'.index'),compact('data'));
    }

    /**
     * @param $id
     * @return Factory|Application|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $data = [];
        $data['career'] = $this->model->find($id);
        if($data['career'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/enquiry_career');
        }

        $data['career']->status = 1;
        $data['career']->save();
        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    public function store(AddCareerFormValidation  $request)
    {
        dd($request->all());
        $file = $request->file('file') ?? null;
        $filename = time() . '.' . $request->file('file')->extension();
        $filePath = public_path() . '/files/uploads/';
        $file->move($filePath, $filename);

        $this->careerService->formStore($request->merge(['image' => $filename])->all());
        $request->session()->flash('success', 'Career Form Submitted Successfully');
        return redirect('/career');
    }

    public function unseen($id)
    {
        $data = [];
        $data['career'] = $this->model->find($id);
        if($data['career'] ==  null){
            session()->flash('error-message',$this->panel.' Unable to find');
            return redirect('admin/enquiry_career');
        }

        $data['career']->status = 0;
        $data['career']->save();
        return redirect('admin/enquiry_career');
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