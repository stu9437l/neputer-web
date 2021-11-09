<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Tags\AddFormValidation;
use App\Http\Requests\Tags\EditFormValidation;
use App\Model\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TagsController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.tags';
    protected $view_path = 'admin.tags';
    protected $panel = 'Tags';
   

    public function __construct()
    {
        $this->model = new Tag();

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
               'id','created_at','updated_at','title','slug','status','seo_title','seo_desc','seo_keywords'
            )
            
            ->where(function ($query) use ($request){

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('tags.title', 'like', '%'.$request->get('filter_title').'%');
                }

                 if ($request->has('filter_slug') && $request->get('filter_slug')) {
                    $query->where('tags.slug', 'like', '%'.$request->get('filter_slug').'%');
                }

                  if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('tags.created_at', 'like', $request->get('filter_created_at').'%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('tags.updated_at', 'like', $request->get('filter_updated_at').'%');
                }

                 if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('tags.status', $request->get('filter_status') == 'active'?1:0);
                }


            })
           
            ->paginate(20);

        return view(parent::loadDefaultViewPath($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return view(parent::loadDefaultViewPath($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {


        $tag = $this->model->create([
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keyword')
           
        ]);

        $request->session()->flash('success-message', $this->panel.' added successfully.');
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
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
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
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
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
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }


        $data['row']->update([
            'title' => $request->get('title'),
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keyword')
        ]);

    
        $request->session()->flash('success-message', $this->panel.' updated successfully.');
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
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route.'.index');
        }

        $data['row']->delete();


        $request->session()->flash('success-message', $this->panel.' deleted successfully.');
        return redirect()->route($this->base_route.'.index');
    }

    protected function delete($row)
    {
        if (!$row) {
            return false;
        }

        $row->delete();
        return true;
    }

}