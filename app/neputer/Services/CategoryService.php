<?php

namespace Neputer\Services;

use App\Helper\AppHelper;
use App\Helper\ConfigHelper;
use Illuminate\Http\Request;
use Neputer\Entities\Category;
use Neputer\Entities\Fact;
use Neputer\Entities\Topic;

/**
 * Class CategoryService
 * @package Neputer\Services
 */
class CategoryService extends BaseService
{

    /**
     * The Category instance
     *
     * @var $model
     */
    protected $model;

    protected $search_params = [];


    /**
     * CategoryService constructor.
     * @param Category $category
     */
    public function __construct(Category $category)
    {
        $this->model = $category;
    }


    public function getSearchDataWithPaginate(array $attributes)
    {
        $data = [];
        $request = $attributes['request'];
        $data['rows'] = Category::select('id', 'title', 'slug', 'status', 'parent_id')
            ->where(function ($query) use ($attributes) {
                if ($attributes['cat_id'] != null) {
                    $query->where('parent_id', $attributes['cat_id']);
                } else {
                    $query->where('parent_id', 0);
                }
            })
            ->where(function ($query) use ($request) {
                if ($request->has('title')) {
                    $query->where('category.title', 'like', '%' . $request->get('title') . '%');
                    $this->search_params['title'] = $request->get('title');
                }
                if ($request->has('status')) {
                    $query->where('category.status', 'like', '%' . $request->get('status') . '%');
                    $this->search_params['status'] = $request->get('status');
                }
            })
            ->orderBy('order_by', 'asc')
            ->paginate($attributes['pagination']);
        $data['params'] = $this->search_params;
        $data['cat_id'] = $attributes['cat_id'];

        if ($data['cat_id']) {
            $data['category_name'] = Category::findOrFail($attributes['cat_id'])->title;
        }

        return $data;
    }

    public function getSearchData(Request $request)
    {
        $records = Category::select(['id', 'title', 'status'])
            ->where(function ($query) use ($request) {
                if ($catId = $request->get('cat_id')) {
                    $query->where('parent_id', $catId);
                } else {
                    $query->where('parent_id', 0);
                }
            })
            ->where(function ($query) use ($request) {
                if ($id = $request->get('id')) {
                    $query->where('category.id', $id);
                }
                if ($title = $request->get('title')) {
                    $query->where('category.title', 'LIKE', "%{$title}%");
                }
                if ($request->get('status') != 'all') {
                    $query->where('category.status', $request->get('status') == 'active' ? 1 : 0);
                }
            })
            ->get();
        return $records;
    }

    public function createNewCategory($request, $parent_id)
    {
        $data = [];
        $increment = 1;
        $category = Category::create([
            'parent_id' => $parent_id,
            'title' => $request->get('title'),
            'slug' => $request->get('title'),
            'detail' => $request->get('detail'),
            'status' => $request->get('status'),
            'category_layout' => $request->get('category_layout'),
            'created_by' => auth()->user()->id,
            'seo_title' => $request->get('seo_title'),
            'seo_keywords' => $request->get('seo_keywords'),
            'seo_description' => $request->get('seo_description'),
        ]);


        if($request->get('facts')){
            foreach ($request->get('facts') as $key => $fact_id) {

                if (Fact::find($fact_id)) {

                    $data[$fact_id] = [
                        'created_by' => auth()->user()->id,
                        'order_by' => $increment++,
                        'status' => 1
                    ];

                }
            }
        }


        $category->facts()->sync($data);

        return true;
    }

    public function updateCategory($model, $request)
    {

        $data = [];
        $increment = 1;
        $model->update([
            'title' => $request->get('title'),
            'slug' => AppHelper::isDefaultCategory($model) ? $model->slug : $request->get('title'),
            'detail' => $request->get('detail'),
            'status' => $request->get('status'),
            'updated_by' => auth()->user()->id,
            'category_layout' => $request->get('category_layout'),
            'seo_title' => $request->get('seo_title'),
            'seo_keywords' => $request->get('seo_keywords'),
            'seo_description' => $request->get('seo_description'),
        ]);

        if($request->get('facts')){
            foreach ($request->get('facts') as $key => $fact_id) {

                if (Fact::find($fact_id)) {

                    $data[$fact_id] = [
                        'updated_by' => auth()->user()->id,
                        'order_by' => $increment++,
                        'status' => 1
                    ];

                }
            }
        }


        $model->facts()->sync([]);
        $model->facts()->sync($data);

        return true;
    }

    public function idExistOrNot($id)
    {
        $data = Category::where('id', $id)->first();
        return $data;
    }

    public function idExist($id)
    {
        $data['row'] = Category::findOrFail($id);
        return $data;
    }

    public function deleteChildRow($parent_id)
    {
        $child_rows = $this->model->where('parent_id', $parent_id)->get();
        if ($child_rows->count()) {
            foreach ($child_rows as $row) {
                $row->delete();
            }
        }
    }

    public function getDetailOfSingleTopic($title_slug)
    {
        return Topic::select('topic.title as top_title', 'topic.details', 'topic.approved_date', 'topic.id', 'topic.task_done_status',
            'category.title as cat_title', 'topic.slug as top_slug', 'category.slug as cat_slug', 'topic.image', 'topic.words', 'topic.page_view_count',
            'topic.seo_title', 'topic.seo_description','topic.updated_at')
            ->join('writing_rates', 'writing_rates.id', '=', 'topic.writing_rates_id')
            ->join('category', 'category.id', '=', 'writing_rates.category_id')
            ->where([
                'topic.slug' => $title_slug,
            ])
            ->orWhere('topic.old_slug', $title_slug)
            ->get()
            ->first();
    }

    public function updateTopicPageView($topic)
    {
        $topic->page_view_count = $topic->page_view_count + 1;
        $topic->save();
    }
}
