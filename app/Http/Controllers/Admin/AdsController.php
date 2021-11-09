<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Ad\AddFormValidation;
use App\Http\Requests\Ad\EditFormValidation;
use App\Model\Ads;
use Illuminate\Http\Request;

class AdsController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.ads';
    protected $base_route = 'admin.ads';
    protected $panel = 'ads';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        //
        $this->model = new Ads();
        $this->folder = config('myPath.assets.image_panel_folder.ads');
        $this->folder_path = public_path('image'.DIRECTORY_SEPARATOR.$this->folder);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $data = [];
        $data['rows'] = $this->model->select('id', 'title', 'ad_type', 'status', 'created_at', 'updated_at', 'hint')
            ->where(function ($query) use ($request) {
                if ($request->has('filter_title') && $request->get('filter_title'))
                    $query->where('title', 'like', '%' . $request->get('filter_title') . '%');
                /*if($request->has('filter_slug') && $request->get('filter_slug'))
                $query->where('slug', 'like', '%'.$request->get('filter_slug').'%');*/
                if ($request->has('filter_type') && $request->get('filter_type'))
                    $query->where('ad_type', 'like', '%' . $request->get('filter_type') . '%');
                if ($request->has('filter_created_at') && $request->get('filter_created_at'))
                    $query->where('created_at', 'like', '%' . $request->get('filter_created_at') . '%');
                if ($request->has('filter_updated_at') && $request->get('filter_updated_at'))
                    $query->where('updated_at', 'like', '%' . $request->get('filter_updated_at') . '%');
                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all')
                    $query->where('status', $request->get('filter_status') == 'active' ? 1 : 0);
            })
            ->paginate(10);
        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {

        return view(parent::loadDefaultViewPath($this->view_path . '.create'));
    }

    public function store(AddFormValidation $request)
    {

        if ($request->get('ad_type') == 'banner') {
            parent::uploadImage($request);
        }

        $this->model->create([
            'title' => $request->get('title'),
            'ad_type' => $request->get('ad_type'),
            'content' => $request->get('content') ?? null,
            'banner' => $this->image_name ?? null,
            'status' => $request->get('status'),
            'hint' => $request->get('hint'),
        ]);
        $request->session()->flash('success_message', $this->panel . ' added Successfully!!');
        return parent::requestRedirect($request);
    }

    public function show(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }
        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }
        return view(parent::loadDefaultViewPath($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {


        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }

        if ($request->get('ad_type') == 'banner') {
            if ($request->hasFile('image')) {
                parent::uploadImage($request, 'update', $data['row']->content, $data['row']->banner);
            }
        }

        if ($request->get('ad_type') == 'script') {
            if($data['row']->banner){
                parent::removeImage($data['row']->banner);
            }
        }

        $data['row']->update([
            'title' => $request->get('title'),
            'ad_type' => $request->get('ad_type'),
            'content' => $request->get('ad_type') == 'script' ? $request->get('content') : null,
            'banner' =>$request->get('ad_type') == 'banner' ? ($this->image_name ?? $data['row']->banner) : null,
            'status' => $request->get('status'),
            'hint' => $request->get('hint'),
        ]);


        $request->session()->flash('success_message', $this->panel . ' updated Successfully!!');
        return parent::requestRedirect($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public
    function destroy(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error_message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }

        $request->session()->flash('success_message', $this->panel . ' deleted Successfully!!');
        return redirect()->route($this->base_route . '.index');
    }

    public
    function delete($row)
    {
        if (!$row) {
            return false;
        }

        if ($row->image) {
            $this->image_name = $row->image;
        } else {
            $this->image_name = $row->content;
        }


        parent::removeImage($this->image_name);
        parent::removeImageThumbs($this->image_name);

        $row->delete();

        return true;

    }
}
