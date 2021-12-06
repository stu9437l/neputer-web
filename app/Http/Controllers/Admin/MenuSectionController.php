<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Model\Pages;
use Foundation\Lib\Cache;
use App\Model\MenuSection;
use Illuminate\Http\Request;
use App\Http\Requests\MenuSection\EditFormValidation;

class MenuSectionController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.menu_section';
    protected $base_route = 'admin.menu-sections';
    protected $panel = 'Menu Section';


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new MenuSection();
    }

    public function index()
    {
        $data = [];

        $data['rows'] = $this->model
            ->select('id', 'title', 'slug', 'hint', 'created_at', 'updated_at')
            ->get();

        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    public function create()
    {
      return view($this->loadDefaultViewPath($this->view_path.'.create'));
    }

    public function edit(Request $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if (!$data['row']) {
            $request->session()->flash('error-message', 'Invalid Request!');
            return redirect()->route($this->base_route . '.index');
        }

        $data['menu_section_page'] = $data['row']->pages()->select('pages.id')->orderBy('rank')->get();
        $data['pages'] = ['0' => 'Select'] + Pages::pluck('title', 'id')->toArray();

        return view(parent::loadDefaultViewPath($this->view_path . '.edit'), compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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

        $data['row']->update($request->except(['_method', '_token', 'id']));

        //update pages
        $data['row']->pages()->sync([]);
        $page_ids = $request->get('page');
        $page_data = [];
        foreach ($page_ids as $key => $page_id) {

            if ($page_id && !array_key_exists($page_id, $page_data)) {
                $page_data[$page_id] = [
                    'rank' => $key + 1,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        $data['row']->pages()->sync($page_data);

        $request->session()->flash('success-message', $this->panel . ' Updated Successfully!');

        Cache::forget( Cache::CACHE_MENU_SECTION_KEY );

        return parent::requestRedirect($request, $id);

    }


    public function loadPageHtml()
    {
        $response = [];
        $response['html'] = view($this->view_path . '.edit.page_row',
            ['pages' => ['0' => 'Select'] + Pages::orderBy('title', 'asc')->select('id', 'title')->pluck('title', 'id')->toArray()])
            ->render();

        return response()->json($response);

    }
}
