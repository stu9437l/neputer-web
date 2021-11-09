<?php


namespace App\Http\Controllers\Admin;
use App\Http\Requests\OurWork\OurWorkStoreValidation;
use App\Model\OurWork;
use App\MyLibraries\service\OurWorkService;
use Illuminate\Http\Request;

class OurWorkController extends BaseController
{
    /**
     * @var OurWorkService
     */
    private $ourWorkService;
    protected $base_route = 'admin.our-work';
    protected $view_path = 'admin.our-work';
    protected $panel = 'Our Work';
    protected $image_name = null;
    protected $folder_path;
    protected $folder;
    /**
     * @var OurWork
     */
    protected $model;


    public function __construct(OurWorkService $ourWorkService)
    {
        $this->ourWorkService = $ourWorkService;
        $this->model = new OurWork();
        $this->folder = config('myPath.assets.image_panel_folder.our-work');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }

    public function index(Request $request)
    {
        $data['rows'] = $this->ourWorkService->getALlOurWork($request);
        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadDefaultViewPath($this->view_path.'.create'));
    }

    public function store(OurWorkStoreValidation $request)
    {
        parent::uploadImage($request);
        $this->ourWorkService->storeOurWork($request->merge(['images' => $this->image_name])->all());
        $request->session()->flash('success-message', $this->panel . ' added successfully');
        return parent::requestRedirect($request);
    }

    public function show($id)
    {
        $data = [];
        $data['row'] = $this->ourWorkService->find($id);

        if( $data['row'] == null){
            session()->flash('error-message',$this->panel. ' View Page Not Found');
            return redirect('admin/our-work');
        }
        else{
            return view(parent::loadDefaultViewPath($this->base_route.'.show'),compact('data'));
        }

    }

    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->ourWorkService->find($id);
        if( $data['row'] == null){
            session()->flash('error-message',$this->panel. ' Edit Page Not Found');
            return redirect('admin/our-work');
        }
        else{
            return view(parent::loadDefaultViewPath($this->view_path.'.edit'),compact('data'));
        }
    }

    public function update(Request $request, $id)
    {
        $ourWork = $this->ourWorkService->find($id);

        $this->image_name = $ourWork->images;
        parent::uploadImage($request, 'update', $ourWork->images);

        $this->ourWorkService->updateOurWord($request->merge(['images' => $this->image_name])->all(), $id);
        $request->session()->flash('success-message',$this->panel.' update Successfully');
        return redirect('admin/our-work');
    }

    public function delete($id)
    {
       if(!$id)
           return false;

       parent::removeImage($id->images);
       $id->delete();

       return true;
    }
    public function manageRank()
    {
        $data = [];
        $data['row'] = $this->model->orderBy('priority')->pluck('name','id');
        return view(parent::loadDefaultViewPath($this->view_path . '.includes.rank_order'), compact('data'));

    }

    public function sortRank(Request $request)
    {

        $data['priority'] = $request->get('priority');
        foreach ($data['priority'] as $key => $priority) {
            $our_work = $this->ourWorkService->find($priority);
            $our_work->priority = ++$key;
            $our_work->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/our-work');

    }

}