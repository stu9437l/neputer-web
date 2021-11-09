<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Testimonial\AddFormValidation;
use App\Http\Requests\Testimonial\EditFormValidation;
use App\Model\Testimonial;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class TestimonialController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.testimonial';
    protected $view_path = 'admin.testimonial';
    protected $panel = 'Testimonial';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        $this->model = new Testimonial();
        $this->folder = config('myPath.assets.image_panel_folder.testimonial');
        $this->folder_path = public_path('image' . DIRECTORY_SEPARATOR . $this->folder);

    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|Application|Response|View
     * @throws AuthorizationException
     */

    public function index(Request $request)
    {

        $data = [];
        $data['rows'] = $this->model
            ->select(
                'id', 'testimonial_by', 'testimonial', 'image', 'designation', 'status', 'order', 'created_at', 'updated_at'
            )
            ->where(function ($query) use ($request) {

                if ($request->has('filter_testimonial_by') && $request->get('filter_testimonial_by')) {
                    $query->where('testimonials.testimonial_by', 'like', '%' . $request->get('filter_testimonial_by') . '%');
                }

                if ($request->has('filter_designation') && $request->get('filter_designation')) {
                    $query->where('testimonials.designation', 'like', '%' . $request->get('filter_designation') . '%');
                }


                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('testimonials.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('testimonials.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('testimonials.status', $request->get('filter_status') == 'active' ? 1 : 0);
                }


            })
            ->orderBy('order', 'ASC')
            ->paginate(20);

        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|Application|Response|View
     * @throws AuthorizationException
     */
    public function create()
    {

        return view(parent::loadDefaultViewPath($this->view_path . '.create'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AddFormValidation $request
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function store(AddFormValidation $request)
    {
        parent::uploadImage($request);

        $this->model->create([
            'testimonial' => $request->get('testimonial'),
            'testimonial_by' => $request->get('testimonial_by'),
            'designation' => $request->get('designation'),
            'address' => $request->get('address'),
            'image' => $this->image_name,
            'status' => $request->get('status'),
        ]);


        $request->session()->flash('success-message', $this->panel . ' added successfully.');
        return parent::requestRedirect($request);
    }

    /**
     * Display the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Factory|Application|RedirectResponse|View
     * @throws AuthorizationException
     */
    public function show(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }


        return view(parent::loadDefaultViewPath($this->view_path . '.show'), compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param int $id
     * @return Factory|Application|RedirectResponse|View
     * @throws AuthorizationException
     */
    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }


        return view(parent::loadDefaultViewPath($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditFormValidation $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(EditFormValidation $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }

        $this->image_name = $data['row']->image;
        parent::uploadImage($request, 'update', $data['row']->image);

        $data['row']->update([
            'testimonial' => $request->get('testimonial'),
            'testimonial_by' => $request->get('testimonial_by'),
            'designation' => $request->get('designation'),
            'image' => $this->image_name,
            'status' => $request->get('status'),
        ]);


        $request->session()->flash('success-message', $this->panel . ' updated successfully.');
        return parent::requestRedirect($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function destroy(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        if (!$this->delete($data['row'])) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }

        $this->image_name = $data['row']->image;
        parent::removeImage($this->image_name);

        $data['row']->delete();


        $request->session()->flash('success-message', $this->panel . ' deleted successfully.');
        return redirect()->route($this->base_route . '.index');
    }

    protected function delete($row)
    {
        if (!$row) {
            return false;
        }

        parent::removeImage($row->image);

        $row->delete();
        return true;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageRank()
    {

        $data = [];
        $data['testimonials'] = $this->model->orderBy('order')->get();

        return view(parent::loadDefaultViewPath($this->view_path . '.include.rank_order'), compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sortRank(Request $request)
    {
        $data['testimonials'] = $request->get('testimonial');
        $i = 0;
        foreach ($data['testimonials'] as $key => $testimonial) {
            $testimonial = $this->model->find($testimonial);
            $testimonial->order = ++$i;
            $testimonial->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/testimonial');
    }

}