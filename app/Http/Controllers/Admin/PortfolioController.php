<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Portfolio\AddFormValidation;
use App\Http\Requests\Portfolio\_EditFormValidation;
use App\Model\Portfolio;
use App\Model\PortfolioCategory;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PortfolioController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.portfolio';
    protected $view_path = 'admin.portfolio';
    protected $panel = 'Portfolio';
    protected $folder;
    protected $folder_path;
    protected $image_name = null;

    public function __construct()
    {
        $this->model = new Portfolio();
        $this->folder = config('myPath.assets.image_panel_folder.portfolios');
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
                'portfolio.id', 'portfolio.created_at', 'portfolio.updated_at', 'portfolio_category_id', 'portfolio.title', 'portfolio.image', 'portfolio.description',
                'portfolio.status', 'portfolio_category.title as portfolio_category', 'portfolio.slug'
            )->join('portfolio_category', 'portfolio_category.id', '=', 'portfolio.portfolio_category_id')
            ->where(function ($query) use ($request) {

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('portfolio.title', 'like', '%' . $request->get('filter_title') . '%');
                }

                if ($request->has('filter_slug') && $request->get('filter_slug')) {
                    $query->where('portfolio.slug', 'like', '%' . $request->get('filter_slug') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('portfolio.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('portfolio.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('portfolio.status', $request->get('filter_status') == 'active' ? 1 : 0);
                }
            })
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
        $data = [];
        $data['porfolioCategories'] = PortfolioCategory::pluck('title', 'id')->toArray();
        return view(parent::loadDefaultViewPath($this->view_path . '.create'), compact('data'));
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

        $portfolio = $this->model->create([
            'title' => $request->get('title'),
            'slug' => Str::slug($request->get('title')),
            'description' => $request->get('description'),
            'image' => $this->image_name,
            'portfolio_category_id' => $request->get('portfolio_category_id'),
            'status' => $request->get('status'),
            'seo_title' => $request->get('seo_title'),
            'seo_description' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keyword'),
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
     * @param Request $request
     * @param $id
     * @return Factory|RedirectResponse|View
     */
    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);
        $data['porfolioCategories'] = PortfolioCategory::pluck('title', 'id')->toArray();
        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid request.');
            return redirect()->route($this->base_route . '.index');
        }


        return view(parent::loadDefaultViewPath($this->view_path . '.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param _EditFormValidation $request
     * @param int $id
     * @return RedirectResponse
     * @throws AuthorizationException
     */
    public function update(_EditFormValidation $request, $id)
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
            'status' => $request->get('status'),
            'portfolio_category_id' => $request->get('portfolio_category_id'),
            'seo_title' => $request->get('seo_title'),
            'seo_description' => $request->get('seo_description'),
            'seo_keywords' => $request->get('seo_keywords')
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

}