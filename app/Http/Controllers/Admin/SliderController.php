<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Slider\AddFormValidation;
use App\Http\Requests\Slider\EditFormValidation;
use App\Model\Slider;
use App\MyLibraries\HelperClass\AppHelper;
use Illuminate\Http\Request;


class SliderController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.sliders';
    protected $base_route = 'admin.sliders';
    protected $panel = 'Slider';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Slider();
        $this->folder = AppHelper::getFolderName('slider');
        $this->folder_path = public_path('image'.DIRECTORY_SEPARATOR.$this->folder);
    }

    public function index(Request $request)
    {

        $data = [];

        $data['rows'] = $this->model->select('id', 'image', 'alt_text', 'caption', 'created_at', 'updated_at', 'status')
            ->where(function ($query) use($request){

                if($request->has('filter_alt_text') && $request->get('filter_alt_text'))
                    $query->where('alt_text', 'like', '%'.$request->get('filter_alt_text').'%');

                if($request->has('filter_caption') && $request->get('filter_caption'))
                    $query->where('caption', 'like', '%'.$request->get('filter_caption').'%');

                if($request->has('filter_created_at') && $request->get('filter_created_at'))
                    $query->where('created_at', 'like', '%'.$request->get('filter_created_at').'%');

                if($request->has('filter_updated_at') && $request->get('filter_updated_at'))
                    $query->where('updated_at', 'like', '%'.$request->get('filter_updated_at').'%');

                if($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all')
                    $query->where('status', $request->get('filter_status') == 'active' ? 1:0);
            })
            ->orderBy('rank', 'ASC')
            ->paginate(10);

        return view(parent::loadDefaultViewPath($this->view_path.'.index'), compact('data'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view(parent::loadDefaultViewPath($this->view_path.'.create'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {

        parent::uploadImage($request);

        Slider::create([
            'image' => $this->image_name,
            'alt_text' => $request->get('alt_text'),
            'caption' => $request->get('caption'),
            'caption_two' => $request->get('caption_two'),
            'rank' => $request->get('rank'),
            'status' => $request->get('status'),
        ]);

        $request->session()->flash('success-message', $this->panel.' added successfully!!');
        return parent::requestRedirect($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row']){
            $request->session()->flash('error-message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }

        return view(parent::loadDefaultViewPath($this->view_path.'.show'), compact('data'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row']){
            $request->session()->flash('error-message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }

        return view(parent::loadDefaultViewPath($this->view_path.'.edit'), compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditFormValidation $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row']){
            $request->session()->flash('error-message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }

        $this->image_name = $data['row']->image;
        parent::uploadImage($request, 'update', $data['row']->image);

        $data['row']->update([
            'image' => $this->image_name,
            'alt_text' => $request->get('alt_text'),
            'caption' => $request->get('caption'),
            'caption_two' => $request->get('caption_two'),
            'rank' => $request->get('rank'),
            'status' => $request->get('status'),
        ]);

        $request->session()->flash('success-message', $this->panel.' updated successfully!!');
        return parent::requestRedirect($request, $id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$this->delete($data['row'])){
            $request->session()->flash('error-message', 'Invalid Request!!');
            return redirect()->route($this->base_route.'.index');
        }


        $request->session()->flash('success-message', $this->panel.' deleted successfully!!');
        return redirect()->route($this->base_route.'.index');

    }

    public function delete($row){

        if(!$row){
            return false;
        }

        $this->image_name = $row->image;
        parent::removeImage($this->image_name);

        $row->delete();

        return true;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageRank()
    {

        $data = [];
        $data['sliders'] = $this->model->orderBy('rank')->pluck('image', 'id');

        return view(parent::loadDefaultViewPath($this->view_path . '.include.rank_order'), compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sortRank(Request $request)
    {

        $data['sliders'] = $request->get('sliders');
        foreach ($data['sliders'] as $key => $sliders) {
            $slider = $this->model->find($sliders);
            $slider->rank = ++$key;
            $slider->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/sliders');
    }
}
