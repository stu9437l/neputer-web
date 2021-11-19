<?php

namespace Neputer\Controller;

use App\Helper\ViewHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\Category;
use Neputer\Entities\Topic;
use Neputer\Entities\WritingRates;
use Neputer\Traits\ConfigTrait;
use Neputer\Traits\Uploadable;
use Neputer\Utils\Acl\Entities\User;
use Neputer\Utils\Acl\Traits\Authorizable;

/**
 * Class BaseController
 * @package Neputer\Controller
 */
class   BaseController extends Controller
{
    use ConfigTrait;
    use Uploadable;
//    use Authorizable;

    /**
     * Base Pagination Limit
     * @var string
     */
    protected $pagination_limit = 25;
    /**
     * Base routes and paths
     *
     * @var $base
     */
    protected $panel;
    protected $view_path;
    protected $base_route;
    protected $base_partial;
    protected $description;
    protected $folder_name;
    protected $folder_path;
    protected $trans_path;

    protected $base = 'home';

    /**
     * Crud view panel titles
     *
     * @var string
     */
    protected $view_panel_titles;

    /**
     * The Config Instance
     *
     * @var $config
     */
    protected $config;
    protected $panel_name;

    /**
     * BaseWizardController constructor.
     * @throws \Exception
     */

    protected $bulk_actions = [
        'active' => 'Active',
        'inactive' => 'Inactive',
        'delete' => 'Delete'
    ];

    public function __construct()
    {
//        $this->middleware('auth');
        $this->view_panel_titles = config('neputer.view_panel.backend');
        $this->config = config('neputer');
        $this->setUpPaths();
    }

    /**
     * Parse data to the given view
     *
     * @param $view_path
     * @return string
     * @throws \Exception
     */
    protected function __parseDataToView($view_path)
    {
        $this->setUpPaths();
        $this->view_panel_titles = config('neputer.view_panel.backend');

        $view = $this->setDesignPath() . '.' . $view_path;

        view()->composer($view, function ($view) use ($view_path) {
            $base = [];
            $base['view_path'] = $this->setDesignPath() . '.' . $this->view_path;
            $base['dashboard_route'] = $this->resolveBackendRoutePrefix() . '.dashboard.index';
            $base['base_route'] = $this->base_route;
            $base['panel'] = $this->panel;
            $base['description'] = $this->description;
            $base['page_title'] = $this->makeViewPanel($view_path);
            $base['page_icon'] = $this->makeViewPanel($view_path, 'icon');
            $base['folder_path'] = $this->folder_path;
            $base['folder_name'] = $this->folder_name;
            $base['partial'] = $this->base_partial;
            $base['permission_suffix'] = $this->resolveBackendRoutePrefix() . '_' . $this->base;
            $base['trans_path'] = $this->trans_path;
            $base['panel_name'] = $this->panel_name;
            $view->with('base', $base);
            $view->with('bulk_actions', $this->bulk_actions);
            $view->with('folder', property_exists($this, 'folder') ? $this->folder : '');
        });

        return $view;
    }

    /**
     * get crud view panel title or icon
     * @param $view_path
     * @param string $key
     * @return string
     */
    protected function makeViewPanel($view_path, $key = 'title')
    {
        $view_path_parts = explode('.', $view_path);
        $view = array_pop($view_path_parts);
        if (!is_null($this->view_panel_titles) && array_key_exists($view, $this->view_panel_titles)) {
            return $this->view_panel_titles[$view][$key] ?? '';
        }
        return '';
    }

    /**
     * Setting up base and paths
     *
     * @throws \Exception
     */
    protected function setUpPaths()
    {
        $singular = str_singular($this->base);
        $this->base_route = $this->resolveBackendRoutePrefix() . '.' . $this->base;
        $this->description = $this->makeDescription($singular);
        $this->panel = $this->description;
        $this->base_partial = 'admin.' . $this->view_path . '.partials';
        $this->folder_name = $singular;
        $this->folder_path = public_path() . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR . $this->folder_name . DIRECTORY_SEPARATOR;
    }

    /**
     * @param $text
     * @return mixed|string
     */
    protected function makeDescription($text)
    {
        $description = ucfirst($text);
        $this->panel_name = $description;
        $exclude = ['-', '_'];
        $description = str_replace($exclude, ' ', $description);
        return $description . " Management";
    }

    /**
     * Redirect if save & continue
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function redirect(Request $request)
    {
        if ($request->has('submit_continue')) {
            return back()->send();
        }

        return redirect()
            ->route($this->base_route . '.index');
    }

    /**
     * Setting up the design path
     *
     * @return string
     */
    protected function setDesignPath()
    {
        return 'admin';
    }

    /**
     * Destroy Response Resolved
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function destroyResponse(Request $request)
    {
        flash('Record successfully deleted.')->success();
        return $this->redirect($request)->send();
    }

    /**
     * Return Backend Route Prefix
     *
     * @return mixed
     */
    protected function resolveBackendRoutePrefix()
    {
        return $this->retrieve('backend_route_prefix', 'admin');
    }

    public function bulkAction(Request $request)
    {
        if ($request->has('bulk_action') && $request->has('row_ids')) {
            // validate pre defined actions
            if (!array_key_exists($request->get('bulk_action'), $this->bulk_actions)) {
                flash('Invalid Request.')->error();
                return redirect()->route($this->base_route . '.index');
            }

            // check if ids are available
            if (!$request->get('row_ids')) {
                flash('Please, check the checkbox to perform actions.')->error();
                return redirect()->route($this->base_route . '.index');
            }

            // perform bulk action
            $ids = explode(',', rtrim($request->get('row_ids'), ','));
            //dd($ids);
            $error_message = '';
            $success_count = 0;
            foreach ($ids as $id) {
                $row = $this->model->find($id);
                if ($row) {
                    switch ($request->get('bulk_action')) {
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
                                $error_message = $error_message . 'User with email (' . $row->email . ') can not be deleted. <br/>';
                            } else {
                                $success_count++;
                            }
                            break;
                    }
                }
            }

            if ($error_message) {
                flash($error_message)->error();
            }
            if ($success_count > 0) {
                flash('Bulk actions (' . $this->bulk_actions[$request->get('bulk_action')] . ') performed successfully for ' . $success_count . ' rows.')->success();
            }
            return redirect()->route($this->base_route . '.index');
        }

        flash('Invalid Request.')->error();
        return redirect()->route($this->base_route . '.index');
    }

    protected function getWriters()
    {
        return User::select('users.id', DB::raw('CONCAT_WS(" ", users.first_name, users.middle_name, users.last_name) AS full_name'))
            ->role('writer')
            ->where('users.is_salary_based_writer', 0)
            ->pluck('full_name', 'id');
    }

    protected function getWritingRatesArr()
    {
        $data = [];
        $writingRates = $this->getWritingRatesCategoryList();
        foreach ($writingRates as $item) {
            $data[$item->id] = ViewHelper::getWritingRateTitleWithWordCount($item);
        }
        return $data;
    }

    public function getWritingRatesCategoryList()
    {
        return WritingRates::select(
            DB::raw(
                "
                    CASE 
                        WHEN writing_rates.category_name_overwrite IS NULL THEN category.title 
                        ELSE writing_rates.category_name_overwrite 
                    END as category_name"
            ),
            'writing_rates.id',
            'writing_rates.category_name_overwrite',
            'writing_rates.word_count_type',
            'writing_rates.min_word_count',
            'writing_rates.max_word_count',
            'writing_rates.standard_rate',
            'writing_rates.status',
            'category.title'
        )->leftjoin('category', 'category.id', '=', 'writing_rates.category_id')
            ->orderBy('category_name')
            ->get();
    }

    protected function getCategories($key = 'id')
    {
        $categories = Category::select('category.id', 'category.title', 'c.title as parent_title', 'category.slug')
            ->leftJoin('category as c', 'c.id', '=', 'category.parent_id')
            ->get();
        $data = [];
        foreach ($categories as $category) {
            $data[$category->{$key}] = $category->parent_title ? $category->parent_title . ' >> ' . $category->title : $category->title;
        }

        return $data;
    }

    public function deleteData($checked_data, $image = null, $dimention = null)
    {
        foreach ($checked_data as $delete_id) {
            $data = $this->idExist($delete_id);
            if (method_exists($data, 'canDelete')) {
                if ($data->canDelete()) {
                    $data->delete();
                }
            } else {
                $data->delete();
            }
        }

        return true;
    }

    public function generateMatchingTitle(Request $request)
    {
        $titles = [];
        $response = [];
        if ($request->get('topic')) {
            $titles = Topic::select('title')
                ->where(function ($query) use ($request) {
                    $query->where('title', 'like', '%' . $request->get('topic') . '%');
                })->get();
        }

        $response['html'] = view('admin.topic.partials.generate_title', compact('titles'))->render();
        return response()->json($response);
    }

    protected function getWritingRate($id)
    {
        $data = $this->getWritingRatesArr();
        return isset($data[$id]) ? $data[$id] : '';
    }

    public function imageHelper(Request $request, $user)
    {
        $imageName = $user->photo;
        if ($request->hasFile('image')) :
            $this->removeImage($imageName);
        return $this->uploadImage($request->file('image')); else :
            return $imageName;
        endif;
    }
}
