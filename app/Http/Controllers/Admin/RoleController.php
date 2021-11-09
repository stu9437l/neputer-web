<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\EditFormValidation;
use App\Model\Role;
use Illuminate\Http\Request;

class RoleController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.role';
    protected $base_route = 'admin.roles';
    protected $panel = 'Role';
    protected $bulk_action = [
        'active' => 'Active',
        'inactive' => 'Inactive',
    ];


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->model = new Role();
    }

    public function index(Request $request)
    {



        $data = [];
//        $data['rows'] = $this->model->all();

        $data['rows'] = $this->model
                                ->select('id', 'role', 'slug', 'hint', 'status', 'created_at', 'updated_at')
                                ->where( function($query) use($request)
                                {

                                    if($request->has('filter_role') && $request->get('filter_role'))
                                    {
                                        $query->where('role', 'like', '%'.$request->get('filter_role').'%');
                                    }

                                    if($request->has('filter_slug') && $request->get('filter_slug'))
                                    {
                                        $query->where('slug', 'like', '%'.$request->get('filter_slug').'%');
                                    }


                                    if($request->has('filter_created_at') && $request->get('filter_created_at'))
                                    {
                                        $query->where('created_at', 'like', '%'.$request->get('filter_created_at').'%');
                                    }

                                    if($request->has('filter_updated_at') && $request->get('filter_updated_at'))
                                    {
                                        $query->where('updated_at', 'like', '%'.$request->get('filter_updated_at').'%');
                                    }

                                    if($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all')
                                    {
                                        $query->where('status', $request->get('filter_status') == 'active' ? 1:0);
                                    }
                                })->get();


        return view(parent::loadDefaultViewPath($this->view_path.'.index'), compact('data'));
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
//        dd($data['row']);

        if(!$data['row'])
        {
            $request->session()->flash('error-message', 'Invalid Request');
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
    public function edit(Request $request, $id){



        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row']) {
            $request->session()->flash('error-message', 'Invalid Request!');
            return redirect()->route($this->base_route . '.index');
        }

        $data['role_detail'] = $data['row'];

        return view(parent::loadDefaultViewPath($this->view_path.'.edit'), compact('data'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {



        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row'])
        {
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route.'.index');
        }

//        dd($request->all());

        $data['row']->update($request->except(['_method', '_token', 'id']));

        $request->session()->flash('success-message', $this->panel.' Updated Successfully!');
        return redirect()->route($this->base_route.'.index');
    }




}
