<?php

namespace App\Http\Controllers\Admin;

use App\Model\OfferType;
use App\MyLibraries\Traits\FileUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;


class BaseController extends Controller
{

    use FileUpload;

    protected $bulk_action = [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'delete' => 'Delete',
    ];

    public function loadDefaultViewPath($view_path)
    {
        View::composer($view_path, function ($view) {
            $view->with('base_route', $this->base_route);
            $view->with('view_path', $this->view_path);
            $view->with('panel', $this->panel);
            $view->with('bulk_action', $this->bulk_action);
            $view->with('folder', property_exists($this, 'folder')?$this->folder:'');
            $view->with('_offer_types', OfferType::select('title', 'slug')->Status()->orderBy('title')->get());
        });

        return $view_path;
    }


    public function bulkAction(Request $request)
    {

        if($request->has('bulk_actions') && $request->has('row_ids')) {

            //validate predefined actions
            if (!array_key_exists($request->get('bulk_actions'), $this->bulk_action)) {
                $request->session()->flash('error-message', 'Invalid Request');
                return redirect()->route($this->base_route . '.index');
            }

            //check if ids are selected or not
            if (!$request->get('row_ids')) {
                $request->session()->flash('error-message', 'Please, select atleast one checkbox to submit');
                return redirect()->route($this->base_route . '.index');
            }

            $ids = explode(',', rtrim($request->get('row_ids'), ','));

            $error_message = '';
            $success_count = 0;

            foreach ($ids as $id) {
                $row = $this->model->find($id);

                if ($row) {

                    switch ($request->get('bulk_actions')){

                        case 'active':
                            $row->status = 1;
                            $row->save();
                            $success_count++;
                            break;

                        case 'inactive':
                            $row->status = 0;
                            $row->save();
                            $success_count++;
                            break;

                        case 'delete':
                            if (!$this->delete($row)) {
                                $error_message = $error_message . 'User with email (' . $row->email . ') cannot be deleted <br/>';
                            } else {
                                $success_count++;
                            }
                            break;
                    }

                }
            }

            if ($error_message)
                $request->session()->flash('error-message', $error_message);
            if ($success_count)
                $request->session()->flash('success-message', 'Bulk action ('. $this->bulk_action[$request->get('bulk_actions')].') completed for '.$success_count.' rows');
            return redirect()->route($this->base_route . '.index');
        }
        $request->session()->flash('error_message', 'Invalid Request');
        return redirect()->route($this->base_route.'.index');
    }


    public function requestRedirect(Request $request, $id = null){

        if ($request->has('submit')) {

            switch ($request->get('submit')) {
                case 'save':
                    return redirect()->route($this->base_route.'.index');
                    break;

                case 'save-continue':
                    return redirect()->route($this->base_route.'.create');
                    break;

                case 'update':
                    return redirect()->route($this->base_route.'.index');
                    break;

                case 'update-continue':
                    return redirect()->route($this->base_route.'.edit', $id);
                    break;

                default:
                    $request->session()->flash('error-message', 'Invalid Request!');
                    return redirect()->route($this->base_route . '.index');
                    break;
            }
        } else {
            $request->session()->flash('error-message', 'Invalid Request!');
            return redirect()->route($this->base_route . '.index');
        }

    }



}
