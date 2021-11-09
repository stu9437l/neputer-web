<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Category\AddFormValidation;
use App\Http\Requests\Category\EditFormValidation;
use App\Model\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.category';
    protected $view_path = 'admin.category';
    protected $panel = 'category';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        $this->model = new Category();
        $this->folder = config('myPath.assets.image_panel_folder.category');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {

        $data = [];
        $data['rows'] = $this->model
            ->select(
                'id', 'created_at', 'updated_at', 'title', 'slug', 'banner', 'description', 'status', 'seo_title', 'seo_desc', 'seo_keywords'
            )
            ->where(function ($query) use ($request) {

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('categories.title', 'like', '%' . $request->get('filter_title') . '%');
                }

                if ($request->has('filter_slug') && $request->get('filter_slug')) {
                    $query->where('categories.slug', 'like', '%' . $request->get('filter_slug') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('categories.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('categories.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('categories.status', $request->get('filter_status') == 'active' ? 1 : 0);
                }


            })
            ->paginate(20);

        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [];
        $data['parentCategory'] = $this->model->where('parent_id', 0)->pluck('title', 'id');

        return view(parent::loadDefaultViewPath($this->view_path . '.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {

        parent::uploadImage($request);

        $category = $this->model->create([
            'title' => $request->get('title'),
            'parent_id' => $request->get('parent_id') ?? 0,
            'slug' => Str::slug($request->get('title')),
            'description' => $request->get('description'),
            'banner' => $this->image_name,
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keyword'),
            'pcount' => 0

        ]);


        $request->session()->flash('success_message', $this->panel . ' added successfully.');
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
            $request->session()->flash('error_message', 'Invalid request.');
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
        $data['parentCategory'] = $this->model->where('parent_id', 0)
                                                ->whereNotIn('id', [$id])
                                                ->pluck('title', 'id');
        if (!$data['row']) {
            $request->session()->flash('error_message', 'Invalid request.');
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
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }

        $this->image_name = $data['row']->banner;
        parent::uploadImage($request, 'update', $data['row']->banner);

        $data['row']->update([
            'parent_id' => $request->get('parent_id') ?? $data['row']->parent_id,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'banner' => $this->image_name,
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keyword')
        ]);


        $request->session()->flash('success_message', $this->panel . ' updated successfully.');
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
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error_message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }

        $this->image_name = $data['row']->image;
        parent::removeImage($this->image_name);

        $data['row']->delete();


        $request->session()->flash('success_message', $this->panel . ' deleted successfully.');
        return redirect()->route($this->base_route . '.index');
    }

    protected function delete($row)
    {
        if (!$row) {
            return false;
        }

        parent::removeImage($row->banner);

        $row->delete();
        return true;
    }

}