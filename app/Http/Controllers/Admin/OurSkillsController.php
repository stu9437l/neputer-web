<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\OurSkills\AddFormValidation;
use App\Http\Requests\OurSkills\EditFormValidation;
use App\Model\OurSkills;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class OurSkillsController extends BaseController
{
    protected $model;
    protected $base_route = 'admin.our-skills';
    protected $view_path = 'admin.our-skills';
    protected $panel = 'Our Skill';


    public function __construct()
    {
        $this->model = new OurSkills();


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
                'id', 'created_at', 'updated_at', 'description', 'title', 'order', 'status'
            )
            ->where(function ($query) use ($request) {

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('our_skills.title', 'like', '%' . $request->get('filter_title') . '%');
                }

                if ($request->has('filter_description') && $request->get('filter_description')) {
                    $query->where('our_skills.description', 'like', '%' . $request->get('filter_description') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('our_skills.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('our_skills.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('our_skills.status', $request->get('filter_status') == 'active' ? 1 : 0);
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

        $ourSkills = $this->model->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
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

        $data['row']->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
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
        $data['row']->delete();


        $request->session()->flash('success-message', $this->panel . ' deleted successfully.');
        return redirect()->route($this->base_route . '.index');
    }

    protected function delete($row)
    {
        if (!$row) {
            return false;
        }

        $row->delete();
        return true;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function manageRank()
    {

        $data = [];
        $data['ourSkills'] = $this->model->orderBy('order')->pluck('title', 'id');

        return view(parent::loadDefaultViewPath($this->view_path . '.includes.rank_order'), compact('data'));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sortRank(Request $request)
    {
        $data['ourSkillIds'] = $request->get('ourSkillIds');
        foreach ($data['ourSkillIds'] as $key => $ourSkillId) {
            $ourSkill = $this->model->find($ourSkillId);
            $ourSkill->order = ++$key;
            $ourSkill->save();
        }

        $request->session()->flash('success-message', $this->panel . ' Updated successfully!!');
        if ($request->get('submit') == 'update-continue') {
            return redirect()->back();
        }

        return redirect('admin/our-skills');
    }

}