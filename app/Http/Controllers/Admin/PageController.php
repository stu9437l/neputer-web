<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\Page\AddFormValidation;
use App\Http\Requests\Page\EditFormValidation;
use App\Model\Pages;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class PageController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.page';
    protected $base_route = 'admin.pages';
    protected $panel = 'Page';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;
    protected $image_dimensions;


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Pages();
        $this->folder = config('myPath.assets.image_panel_folder.page');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);
        $this->image_dimensions = config('myPath.image_dimensions.' . $this->folder);
    }

    public function index(Request $request)
    {

        $data = [];
        $data['rows'] = $this->model
            ->select('id', 'title', 'slug', 'page_type', 'created_at', 'updated_at', 'status')
            ->where(function ($query) use ($request) {
                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('title', 'like', '%' . $request->get('filter_title') . '%');
                }


                if ($request->has('filter_slug') && $request->get('filter_slug')) {
                    $query->where('slug', 'like', '%' . $request->get('filter_slug') . '%');
                }

                if ($request->has('filter_page_type') && $request->get('filter_page_type')) {
                    $query->where('page_type', 'like', '%' . $request->get('filter_page_type') . '%');
                }


                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('created_at', 'like', '%' . $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('updated_at', 'like', '%' . $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('status', $request->get('filter_status') == 'active' ? 1 : 0);
                }
            })
            ->paginate(25);

        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view(parent::loadDefaultViewPath($this->view_path . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {
        $parent_id = $request->get('parent_id') ?? 0;
        parent::uploadImage($request);
        parent::uploadImageThumbs($request);

        Pages::create([
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'open_in' => $request->get('open_in'),
            'page_type' => $request->get('page_type'),
            'link' => $request->get('link'),
            'content' => $request->get('content'),
            'image' => $this->image_name,
            'status' => $request->get('status'),
            'hint' => $request->get('hint'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_desc'),
            'seo_keys' => $request->get('seo_keys'),
            'parent_id' => $parent_id

        ]);

        $request->session()->flash('success-message', $this->panel . ' Added Successfully!');
        return parent::requestRedirect($request);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid Request');
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
            $request->session()->flash('error-message', 'Invalid Request!');
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
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }


        $this->image_name = $data['row']->image;

        //updating image
        parent::uploadImage($request, 'update', $data['row']->image);
        parent::uploadImageThumbs($request, 'update', $data['row']->image);


        if ($request->get('page_type') == 'link') {
            $link = $request->get('link');
            $content = null;
        } else {
            $link = null;
            $content = $request->get('content');
        }

        $data['row']->update([
            'title' => $request->get('title'),
//            'slug' => $request->get('slug'),
            'open_in' => $request->get('open_in'),
            'page_type' => $request->get('page_type'),
            'link' => $link,
            'content' => $content,
            'image' => $this->image_name,
            'status' => $request->get('status'),
            'hint' => $request->get('hint'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_desc'),
            'seo_keys' => $request->get('seo_keys'),
        ]);

        $request->session()->flash('success-message', $this->panel . ' Updated Successfully!');
        return parent::requestRedirect($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route . '.index');
        }


        $this->delete($data['row']);

        $request->session()->flash('success-message', $this->panel . ' Deleted Successfully!');
        return redirect()->route($this->base_route . '.index');
    }

    public function delete($data)
    {

        $data->delete();
        //remove the image
        if (!is_null($data->image))
            parent::removeImage($data->image);
        parent::removeImageThumbs($data->image);

        return true;
    }

    public function menuList(Request $request)
    {
        if($request->ajax())
        {
            $data = $this->model->where('title', 'like','%'.$request->get('q').'%')->get();
            if ($data->count() > 0) {
                foreach ($data as $datum) {
                    $response[] =  [
                        'id' => $datum->id,
                        'text' => $datum->title,
                    ];
                }
            }
        }
        return response()->json([
            'body'=>$response,
        ], Response::HTTP_OK);
    }

}
