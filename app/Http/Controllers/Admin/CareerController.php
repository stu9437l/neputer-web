<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\Career\AddFormValidation;
use App\Http\Requests\Career\CareerUpadateValidation;
use App\Model\Career;
use App\MyLibraries\service\careerService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;

class CareerController extends BaseController
{
    /**
     * @var careerService
     */
    protected $panel = 'Career';
    protected $folder;
    protected $folder_path;
    protected $view_path = 'admin.career';
    protected $base_route = 'admin.career';
    protected $image_name = null;
    protected $careerService;
    protected $model;

    /**
     * CareerController constructor.
     * @param careerService $careerService
     */
    public function __construct(careerService $careerService)
    {
        $this->careerService = $careerService;
        $this->model = new Career();
        $this->folder = config('myPath.assets.image_panel_folder.career');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }

    /**
     * @param Request $request
     * @return Factory|Application|View
     */
    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->careerService->getAllCareer($request);
        return view($this->loadDefaultViewPath($this->view_path.'.index'),compact('data'));
    }

    /**
     * @return Factory|Application|View
     */
    public function create()
    {
        return view($this->loadDefaultViewPath($this->view_path.'.create'));
    }

    /**
     * @param AddFormValidation $request
     * @return RedirectResponse
     */
    public function store(AddFormValidation $request)
    {
        $this->careerService->store($request->validated());
        $request->session()->flash('success-message', $this->panel . ' Created Successfully');
        return parent::requestRedirect($request);
    }

    /**
     * @param $id
     * @return Factory|Application|RedirectResponse|Redirector|View
     */
    public function show($id)
    {
        $data = [];
        $data['row'] = $this->careerService->findOrfailCareer($id, 'show');
        return $data['row'] == true ?
            view($this->loadDefaultViewPath($this->view_path . '.show'), compact('data')) :
            redirect('/admin/career');

    }

    /**
     * @param $id
     * @return Factory|Application|RedirectResponse|Redirector|View
     */
    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->careerService->findOrfailCareer($id, 'edit');
        return $data['row'] == true ?
                view($this->loadDefaultViewPath($this->view_path . '.edit'), compact('data')) :
                redirect('/admin/career');
    }


    /**
     * @param CareerUpadateValidation $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(CareerUpadateValidation $request, $id)
    {
        $data = [];
        $data['row'] = $this->careerService->findOrfailCareer($id, 'update');
        $this->careerService->update($request->validated(), $id);
        $request->session()->flash('success-message', $this->panel . ' Updated Successfully');
        return parent::requestRedirect($request);

    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id)
    {
        $id = $this->careerService->find($id);
        if($id == null)
        {
            session()->flash('error-message',$this->panel.' Cannot Find');
            return redirect()->back();
        }

        $id->delete();
        session()->flash('success-message',$this->panel.' Deleted Successfully');
        return redirect()->back();
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $id->delete();
        return true;
    }

    /**
     * @return Factory|Application|View
     */
    public function manageRank()
    {
        $data = [];
        $data['career'] = $this->careerService->pluckManageRank();
        return view($this->loadDefaultViewPath($this->view_path.'.includes.manage-rank'),compact('data'));
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function sortRank(Request $request)
    {
        $data = [];
        $data['careerIds'] = $request->get('careerIds');
        foreach ($data['careerIds'] as $key => $careerIds) {
            $career = $this->careerService->find($careerIds);
            $career->priority = ++$key;
            $career->save();
        }
        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/career');
    }


}