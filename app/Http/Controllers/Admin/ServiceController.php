<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Services\AddFormValidation;
use App\Http\Requests\Services\EditFormValidation;
use App\Model\Service;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ServiceController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.services';
    protected $view_path = 'admin.service';
    protected $panel = 'Service';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        $this->model = new Service();
        $this->folder = config('myPath.assets.image_panel_folder.services');
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
                'services.id', 'services.created_at', 'services.updated_at', 'services.title', 'services.expertise_title', 'services.image', 'services.description',
                'services.status'
            )
            ->where(function ($query) use ($request) {

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('services.title', 'like', '%' . $request->get('filter_title') . '%');
                }

                if ($request->has('filter_slug') && $request->get('filter_slug')) {
                    $query->where('services.slug', 'like', '%' . $request->get('filter_slug') . '%');
                }

                if ($request->has('filter_expertise_title') && $request->get('filter_expertise_title')) {
                    $query->where('services.expertise_title', 'like', '%' . $request->get('filter_expertise_title') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('services.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('services.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('services.status', $request->get('filter_status') == 'active' ? 1 : 0);
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
     */
    public function store(AddFormValidation $request)
    {

        parent::uploadImage($request);

        $this->model->create([
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title').'-'.str_random(5).'-'.str_random(5)),
            'description' => $request->get('description'),
            'image' => $this->image_name,
            'expertise_title' => $request->get('expertise_title'),
            'highlight_description' => $request->get('highlight_description'),
            'service_description' => $request->get('service_description'),
            'expertise_detail' => $request->get('expertise_detail'),
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_desc'),
            'seo_keywords' => $request->get('seo_keywords'),
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
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'image' => $this->image_name,
            'expertise_title' => $request->get('expertise_title'),
            'expertise_detail' => $request->get('expertise_detail'),
            'highlight_description' => $request->get('highlight_description'),
            'service_description' => $request->get('service_description'),
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_desc'),
            'seo_keywords' => $request->get('seo_keywords'),
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
        $data['services'] = $this->model->orderBy('order')->pluck('title', 'id');

        return view(parent::loadDefaultViewPath($this->view_path . '.includes.rank_order'), compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sortRank(Request $request)
    {
        $data['serviceIds'] = $request->get('serviceIds');
        foreach ($data['serviceIds'] as $key => $serviceId) {
            $service = $this->model->find($serviceId);
            $service->order = ++$key;
            $service->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/services');
    }

}