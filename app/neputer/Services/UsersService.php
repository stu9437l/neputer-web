<?php

namespace Neputer\Services;

use App\Http\Controllers\Admin\UsersController;
use Illuminate\Http\Request;
use App\User;
use Neputer\Traits\FileUploadTrait;

/**
 * Class UsersService
 * @package Neputer\Services
 */
class UsersService extends BaseService
{
    use FileUploadTrait;

    /**
     * The Users instance
     *
     * @var $model
     */
    protected $model;

    /**
     * Image name
     *
     * @var null
     */
    protected $image_name = null;
    protected $folder_path;
    protected $folder;
    protected $image_dimensions;
    /**
     * UsersService constructor.
     * @param User $user
     */

    public function __construct(User $user)
    {
        $this->model = $user;
        $this->folder = config('neputer.assets.panel_image_folders.users');
        $this->folder_path = public_path('assets/admin/images' . DIRECTORY_SEPARATOR . $this->folder);
        $this->image_dimensions = config('neputer.image-dimensions.users');
    }

    public function searchResults(Request $request)
    {
        $records = User::select(['id', 'name', 'email', 'status'])
            ->with('roles:name')
            ->where(function ($query) use ($request) {

                if ($name = $request->get('name')) {
                    $query->where('users.name', 'LIKE', "%{$name}%");
                }
                if($email = $request->get('email')){
                    $query->where('users.email','LIKE',"%{$email}%");
                }
                if($role = $request->get('role')){
                    $query->role($role);
                }
                if($request->get('status') != 'all'){
                    $query->where('users.status',$request->get('status') == 'active'?1:0);
                }
                if($id = $request->get('id')){
                    $query->where('users.id', $id);
                }
            })
            ->get();
        return $records;
    }

    /**
     * Update User
     *
     * @param $request
     * @param $user
     * @return mixed
     */
    public function updateUser($request, $user)
    {
        $this->_uploadImage($request,'update',$user->photo,$request->file('image'));
        $this->uploadImageThumbs($request,'update',$user->photo,$request->file('image'));

        $request = $request->merge(['photo' => $this->image_name]);

        $user = $this->update($request->except('image'), $user);

        if(auth()->user()->hasRole(config('neputer.user_type.admin.key'))) {
            $user->syncRoles($request->get('roles'));
        }

        return $user;
    }

}
