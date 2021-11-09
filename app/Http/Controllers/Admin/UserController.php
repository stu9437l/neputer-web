<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\User\AddFormValidation;
use App\Http\Requests\User\EditFormValidation;
use App\Model\Role;
use App\Model\UserDetails;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends BaseController
{

    protected $model;
    protected $view_path = 'admin.user';
    protected $base_route = 'admin.users';
    protected $panel = 'Users';
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
        $this->model = new User();
        $this->folder = config('myPath.assets.image_panel_folder.user');
        $this->folder_path = public_path('image'.DIRECTORY_SEPARATOR.$this->folder);
        $this->image_dimensions = config('myPath.image_dimensions.'.$this->folder);
    }

    public function index(Request $request)
    {

        $data = [];
//        $data['rows'] = $this->model->all();

        $data['rows'] = $this->model
            ->select('users.id', 'users.email', 'users.status', 'users.created_at', 'users.updated_at',
                'user_details.first_name', 'user_details.middle_name',
                'user_details.last_name', 'user_details.profile_image')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->orderBy('users.id', 'ASC')
            ->with('roles')
            ->where( function($query) use($request)
            {

                if($request->has('filter_email') && $request->get('filter_email'))
                {
                    $query->where('users.email', 'like', '%'.$request->get('filter_email').'%');
                }

                if($request->has('filter_name') && $request->get('filter_name')){

                    $full_name = explode(' ', $request->get('filter_name'));


                    if(count($full_name) == 1){
                        $query->orWhere('user_details.first_name', 'like', '%'.$request->get('filter_name').'%')
                            ->orWhere('user_details.middle_name', 'like', '%'.$request->get('filter_name').'%')
                            ->orWhere('user_details.last_name', 'like', '%'.$request->get('filter_name').'%');
                    }

                    else if(count($full_name) == 2){
                        $query->orWhere('user_details.first_name', 'like', '%'.$full_name[0].'%')
                            ->orWhere('user_details.last_name', 'like', '%'.$full_name[1].'%');
                    }

                    else if(count($full_name) == 3){
                        $query->orWhere('user_details.first_name', 'like', '%'.$full_name[0].'%')
                            ->orWhere('user_details.middle_name', 'like', '%'.$full_name[1].'%')
                            ->orWhere('user_details.last_name', 'like', '%'.$full_name[2].'%');
                    }

                }

                if($request->has('filter_created_at') && $request->get('filter_created_at'))
                {
                    $query->where('users.created_at', 'like', '%'.$request->get('filter_created_at').'%');
                }

                if($request->has('filter_updated_at') && $request->get('filter_updated_at'))
                {
                    $query->where('users.updated_at', 'like', '%'.$request->get('filter_updated_at').'%');
                }

                if($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all')
                {
                    $query->where('users.status', $request->get('filter_status') == 'active' ? 1:0);
                }
            })
            ->paginate(5);

//        dd($data['rows']);

//        dd(\DB::table('user_details')->where('user_id', $data['rows']->first()->id)->first());

        return view(parent::loadDefaultViewPath($this->view_path.'.index'), compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = [];
        $data['roles'] = Role::select('id', 'role')->get();

        return view(parent::loadDefaultViewPath($this->view_path.'.create'), compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddFormValidation $request)
    {

        $users = $this->model->create([
            'name' => $request->get('email'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'status' => $request->get('status')
        ]);


        parent::uploadImage($request);
        parent::uploadImageThumbs($request);

        UserDetails::create([
            'user_id' => $users->id,
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'gender' => 'male',
            'profile_image' => $this->image_name,
        ]);

        $users->roles()->sync($request->get('role'));

        $request->session()->flash('success-message', $this->panel.' Added Successfully!');

        return redirect()->route($this->base_route.'.index');
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

        $data['row'] = $this->model->with('roles')->find($id);

        if(!$data['row'])
        {
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route.'.index');
        }

        $data['user_detail'] = $data['row']->userDetail;

//        dd($data['row']->toArray());

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
            $request->session()->flash('error-message', 'Invalid Request!');
            return redirect()->route($this->base_route.'.index');
        }

        $data['user_detail'] = $data['row']->userDetail;

        $data['row']->first_name = $data['user_detail']->first_name;
        $data['row']->middle_name = $data['user_detail']->middle_name;
        $data['row']->last_name = $data['user_detail']->last_name;

        $data['user_roles'] = $data['row']->roles()->pluck('roles.role', 'roles.id')->toArray();

//        dd($data['user_roles']);

        $data['roles'] = Role::select('id', 'role')->get();

        return view(parent::loadDefaultViewPath($this->view_path.'.edit'), compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param EditFormValidation $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(EditFormValidation $request, $id)
    {

        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$data['row'])
        {
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route.'.index');
        }

        $data['user_detail'] = $data['row']->userDetail;

        $data['row']->update([
            'email' => $request->get('email'),
            'password' => $request->get('password')?bcrypt($request->get('password')):$data['row']->password,
            'status' => $request->get('status'),

        ]);


        $this->image_name = $data['user_detail']->profile_image;

        //updating image
        parent::uploadImage($request, 'update', $data['user_detail']->profile_image);
        parent::uploadImageThumbs($request, 'update', $data['user_detail']->profile_image);


        $data['user_detail']->update([
            'first_name' => $request->get('first_name'),
            'middle_name' => $request->get('middle_name'),
            'last_name' => $request->get('last_name'),
            'profile_image' => $this->image_name,
        ]);

        $data['row']->roles()->sync($request->get('role'));

        $request->session()->flash('success-message', $this->panel.' Updated Successfully!');
        return redirect()->route($this->base_route.'.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(Request $request, $id)
    {
        $data = [];
        $data['row'] = $this->model->find($id);

        if(!$this->delete($data['row']))
        {
            $request->session()->flash('error-message', 'Invalid Request');
            return redirect()->route($this->base_route.'.index');
        }

//        $data['row']->userDetail->delete();
//        $data['row']->delete();

        $request->session()->flash('success-message', $this->panel.' Deleted Successfully!');
        return redirect()->route($this->base_route.'.index');
    }

    protected function delete($row)
    {

        if(!$row || !$row->isDeletable())
        {
            return false;
        }

        $user_detail = $row->userDetail;

        //remove the image

        parent::removeImage($user_detail->profile_image);
        parent::removeImageThumbs($user_detail->profile_image);


        $user_detail->delete();
        $row->delete();

        return true;

    }


}
