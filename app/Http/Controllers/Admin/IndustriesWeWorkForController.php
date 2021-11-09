<?php


namespace App\Http\Controllers\Admin;
use App\Http\Requests\IndustriesWeWorkFor\IndustriesWeWorkForUpdateValidation;
use App\Http\Requests\IndustriesWeWorkFor\IndustriesWeWorkForValidation;
use App\Model\IndustriesWeWorkFor;
use App\MyLibraries\service\IndustriesWeWorkForService;
use Illuminate\Http\Request;

class IndustriesWeWorkForController extends BaseController
{

    /**
     * @var IndustriesWeWorkForService
     */
    protected $industriesWeWorkForService;
    protected $view_path = 'admin.industries-we-work-for';
    protected $base_route = 'admin.industries-we-work-for';
    protected $panel = 'Industries We Work For';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct(IndustriesWeWorkForService $industriesWeWorkForService)
    {
        $this->folder = config('myPath.assets.image_panel_folder.industries-we-work-for');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
        $this->industriesWeWorkForService = $industriesWeWorkForService;
    }

    public function index()
    {
        $data = [];
        $data['rows'] = $this->industriesWeWorkForService->getIndustries();
        return view(parent::loadDefaultViewPath($this->view_path . '.index'),compact('data'));
    }

    public function create()
    {
        return view(parent::loadDefaultViewPath($this->view_path. '.create'));
    }

    public function show($id)
    {
        $data = [];
        $data['row'] =  $this->industriesWeWorkForService->find($id);

        if( $data['row'] == null){
            session()->flash('error-message',$this->panel. ' View Page Not Found');
            return redirect('admin/industries-we-work-for');
        }
        else{
            return view(parent::loadDefaultViewPath($this->base_route.'.show'),compact('data'));
        }
    }

    public function edit($id)
    {
        $data = [];
        $data['row'] =  $this->industriesWeWorkForService->find($id);

        if( $data['row'] == null){
            session()->flash('error-message',$this->panel. ' View Page Not Found');
            return redirect('admin/industries-we-work-for');
        }
        else{
            return view(parent::loadDefaultViewPath($this->base_route.'.edit'),compact('data'));
        }
    }

    public function store(IndustriesWeWorkForValidation $request)
    {

        parent::uploadImage($request);
        $this->industriesWeWorkForService->store($request->merge(['image'=>$this->image_name])->all());

        $request->session()->flash('success-message', $this->panel .' Created Successfully');
        return parent::requestRedirect($request);
    }

     public function update(IndustriesWeWorkForUpdateValidation $request, $id)
     {
         $industries = $this->industriesWeWorkForService->find($id);
         if ($request->has('file')) {
             parent::uploadImage($request,'update', $industries->image);
             $request->merge(['image' => $this->image_name ]);
         }
         $industries->update($request->all());

         $request->session()->flash('success-message', $this->panel .' Updated Successfully');
         return redirect()->back();


     }

    public function manageRank()
    {
        
    }

    public function sortRank()
    {
        
    }


}