<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\DevelopmentProcess\DevelopmentProcessValidation;
use App\Http\Requests\DevelopmentProcess\EditFormValidation;
use App\Model\DevelopmentProcess;
use App\MyLibraries\service\DevelopmentProcessService;
use Illuminate\Http\Request;


class DevelopmentProcessController extends BaseController
{
    /**
     * @var DevelopmentProcessService
     */
    protected $model;
    protected $developmentProcessService;
    protected $base_route = 'admin.development-process';
    protected $view_path = 'admin.development-process';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;
    protected $panel = 'Development Process';

    /**
     * DevelopmentProcessController constructor.
     * @param DevelopmentProcessService $developmentProcessService
     */

     public function __construct(DevelopmentProcessService $developmentProcessService)
     {
         $this->model = new DevelopmentProcess();
         $this->folder = config('myPath.assets.image_panel_folder.development-process');
         $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
         $this->developmentProcessService = $developmentProcessService;
     }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->developmentProcessService->getAllDevelopmentProcess($request);
        return view(parent::loadDefaultViewPath($this->view_path.'.index'),compact('data'));
    }

    public function create()
    {
         return view(parent::loadDefaultViewPath($this->view_path.'.create'));
    }

    public function edit($id)
    {
        $data =[];
        $data['row'] = $this->developmentProcessService->find($id);
        if( $data['row'] == null) {
            session()->flash('error-message',$this->panel.' Cannot Edit');
            return redirect('admin/development-process');
        }
         return view(parent::loadDefaultViewPath($this->view_path.'.edit'),compact('data'));
    }

    public function show($id)
    {
        $data =[];
        $data['row'] = $this->developmentProcessService->find($id);
        if( $data['row'] == null) {
            session()->flash('error-message',$this->panel.' Cannot Show');
            return redirect('admin/development-process');
        }
        return view(parent::loadDefaultViewPath($this->view_path.'.show'),compact('data'));
    }

    public function store(DevelopmentProcessValidation $request)
    {
        parent::uploadImage($request);
        $this->developmentProcessService->store($request->merge(['image'=>$this->image_name])->all());

        $request->session()->flash('success-message',$this->panel.' Created Successfully');
        return parent::requestRedirect($request);
    }

    public function update(EditFormValidation $request, $id)
    {
        $development_service = $this->developmentProcessService->find($id);
        if ($request->has('file')) {
            parent::uploadImage($request,'update', $development_service->image);
            $request->merge(['image' => $this->image_name ]);
        }
        $development_service->update($request->all());

        $request->session()->flash('success-message', $this->panel .' Updated Successfully');
        return parent::requestRedirect($request);


    }

    public function destroy($id)
    {
        $data = [];
        $data['row'] = $this->developmentProcessService->find($id);
        if ($data['row'] == null) {
            session()->flash('error-message', $this->panel . ' Cannot Show');
            return redirect('admin/development-process');
        }
        $data['row']->delete();
        session()->flash('success-message', $this->panel . ' Deleted Successfully');
        return redirect('admin/development-process');
    }

    public function manageRank()
    {
        $data = [];
        $data['development-process'] = $this->developmentProcessService->manageRank();
        return view(parent::loadDefaultViewPath($this->view_path . '.includes.rank_order'), compact('data'));
    }

    public function sortRank(Request $request)
    {
        $data['rowIds'] = $request->get('rowIds');
        foreach ($data['rowIds'] as $key => $developmentProcessId) {
            $developmentProcess = $this->developmentProcessService->find($developmentProcessId);
            $developmentProcess->priority = ++$key;
            $developmentProcess->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/development-process');
    }

}