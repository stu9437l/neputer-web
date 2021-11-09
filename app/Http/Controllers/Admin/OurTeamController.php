<?php


namespace App\Http\Controllers\Admin;


use App\Http\Requests\OurTeam\OurTeamFormValidation;
use App\Model\OurTeam;
use Illuminate\Http\Request;

class OurTeamController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.our-team';
    protected $view_path = 'admin.our-team';
    protected $panel = 'OurTeam';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        $this->model = new OurTeam();
        $this->folder = config('myPath.assets.image_panel_folder.our-team');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
    }

    public function index(Request $request)
    {
        $data = [];
        $data['rows'] = $this->model->orderBy('priority')->get();
        $data['rows'] = $this->model
            ->where(function ($query) use ($request) {

                if ($request->has('filter_name') && $request->get('filter_name')) {
                    $query->where('name', 'like', '%' . $request->get('filter_name') . '%');
                }

                if ($request->has('filter_role') && $request->get('filter_role')) {
                    $query->where('role', 'like', '%' . $request->get('filter_role') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('updated_at', 'like', $request->get('filter_updated_at') . '%');
                }
            })
            ->orderBy('priority')
            ->get();
        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
        return view(parent::loadDefaultViewPath($this->view_path.'.create'));
    }

    public function store(OurTeamFormValidation  $request)
    {
        parent::uploadImage($request);
        $this->model->create($request->merge(['images' => $this->image_name])->all()) ?
        $request->session()->flash('success-message', $this->panel . ' added successfully.') :
        $request->session()->flash('error-message', $this->panel.'Unable to Add');
        return parent::requestRedirect($request);
    }

    public function show($id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);

        if($data['row'] == null){
            session()->flash('error-message', $this->panel. ' Show Page Not Found');
            return redirect('admin/our-team');
        }
        return view(parent::loadDefaultViewPath($this->view_path.'.show'),compact('data'));
    }

    public function edit($id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);

        if($data['row'] == null) {
            session()->flash('error-message',$this->panel . ' Edit Page Not Found');
            return redirect('admin/our-team');
        }
        return view(parent::loadDefaultViewPath($this->view_path.'.edit'),compact('data'));
    }

    public function update(Request $request, $id)
    {
        parent::uploadImage($request);
        $this->model->where('id', $id)->update([
            'images' => $this->image_name,
             'name' => $request->get('name'),
             'description' => $request->get('description'),
             'role' => $request->get('role'),
             'priority' => $request->get('priority'),
        ]);
        return redirect()->back()->with('success-message',$this->panel.' Update Successfully');
    }

    public function destroy($row)
    {
        if (!$row) {
            return false;
        }
        $row = $this->model->find($row);
        if($row == null)
        {
            session()->flash('error-message',$this->panel.' Cannot Find');
            return redirect()->back();
        }
        parent::removeImage($row->image);

        $row->delete();
        session()->flash('success-message',$this->panel.' Deleted Successfully');
        return redirect()->back();
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
             $our_team = $this->model->find($priority);
             $our_team->priority = ++$key;
             $our_team->save();
         }

         $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
         if ($request->get('submit') == 'update-continue') {
             return redirect()->back();
         }

         return redirect('admin/our-team');

    }
}