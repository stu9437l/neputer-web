<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\WhyUs\WhyUsFormValidation;
use App\Model\WhyUs;
use App\MyLibraries\service\WhyUsService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class whyUsController extends BaseController
{
    /**
     * @var WhyUs
     */
    protected $model;
    protected $base_route = 'admin.why-us';
    protected $view_path = 'admin.why-us';
    protected $folder;
    protected $panel = 'WhyUs';
    protected $folder_path;
    protected $image_name = null;
    protected $whyUsService;

    public function __construct(WhyUsService $whyUsService)
    {
        $this->model = new WhyUs();
        $this->folder = config('myPath.assets.image_panel_folder.why-us');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
        $this->whyUsService = $whyUsService;
    }

    /**
     * @param Request $request
     * @return Factory|Application|View
     */
    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->whyUsService->getAllWhyUs($request);
        return view(parent::loadDefaultViewPath($this->base_route . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadDefaultViewPath($this->base_route.'.create'));
    }

    /**
     * @param $id
     * @return string
     */
    public function edit($id)
    {
       $data = [];
       $data['row'] = $this->model->find($id);

       if($data['row'] == null){
           session()->flash('error-message', $this->panel . ' Edit Page Not Found');
           return redirect('admin/why-us');
       }
       return view(parent::loadDefaultViewPath($this->base_route.'.edit'),compact('data'));
    }

    public function show($id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);

        if($data['row'] == null){
            session()->flash('error-message', $this->panel.' Show Page Not Found');
            return redirect('admin/why-us');
        }
        return view(parent::loadDefaultViewPath($this->base_route.'.show'),compact('data'));
    }

    public function store(WhyUsFormValidation $request)
    {
        parent::uploadImage($request);
        $this->model->create($request->merge(['images'=>$this->image_name])->all());
        $request->session()->flash('success-message',$this->panel.' Created Successfully');

        return parent::requestRedirect($request);
    }

    public function update(Request $request, $id): RedirectResponse
    {
        if($request->get('image')){
            parent::uploadImage($request);
            $this->model->find($id)->update( $request->merge(['images'=>$this->image_name])->all());
        }
        else{
            $this->model->find($id)->update( $request->all());
        }
        $request->session()->flash('success-message',$this->panel.' Update Successfully');
        return parent::requestRedirect($request);
    }

    public function delete($row): bool
    {
        if (!$row) {
            return false;
        }
        parent::removeImage($row->image);
        $row->delete();
        return true;
    }
    public function manageRank()
    {
        $data = [];
        $data['row'] = $this->model->orderBy('priority')->pluck('title','id');
        return view(parent::loadDefaultViewPath($this->view_path . '.include.rank_order'), compact('data'));

    }
    public function sortRank(Request $request)
    {
        $data['priority'] = $request->get('priority');
        foreach ($data['priority'] as $key => $priority) {
            $our_team = $this->model->find($priority);
            $our_team->priority = ++$key;
            $our_team->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/why-us');

    }
}