<?php

namespace Neputer\Services;

use App\Helper\ViewHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\WritingRates;

/**
 * Class WritingRatesService
 * @package Neputer\Services
 */
class WritingRatesService extends BaseService
{

    /**
     * The WritingRates instance
     *
     * @var $model
     */
    protected $model;
    protected $search_params = [];

    /**
     * WritingRatesService constructor.
     * @param WritingRates $writingrates
     */
    public function __construct(WritingRates $writingrates)
    {
        $this->model = $writingrates;
    }

//    public function getSearchDataWithPaginate($request, $pagination = 10)
//    {
//        $data = [];
//        $data['rows'] = WritingRates::select(
//            DB::raw("CASE
//                          WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
//                          ELSE writing_rates.category_name_overwrite
//                      END as category_name"),
//            'writing_rates.id', 'writing_rates.category_name_overwrite', 'writing_rates.word_count_type',
//            'writing_rates.min_word_count', 'writing_rates.max_word_count', 'writing_rates.standard_rate',
//            'writing_rates.status', 'category.title')
//            ->leftjoin('category', 'category.id','=','writing_rates.category_id')
//            ->where(function ($query) use ($request) {
//                if ($request->has('category_name')) {
//                    $query->orWhere(function ($sub_query) use ($request) {
//                        $sub_query->where('category.title', 'like', '%' . $request->get('category_name') . '%');
//                        $sub_query->orWhere('writing_rates.category_name_overwrite', 'like', '%' . $request->get('category_name') . '%');
//                    });
//                    $this->search_params['category_name'] = $request->get('category_name');
//                }
//                if ($request->has('status')) {
//                    if ($request->get('status') != 'any')
//                        $query->where('writing_rates.status', $request->get('status') == 'active'?1:0);
//                    $this->search_params['status'] = $request->get('status');
//                }
//                if ($request->has('word-count')) {
//                    $query->where(function ($sub_query) use ($request) {
//                        $sub_query->where('min_word_count', '>=', ViewHelper::getMinMaxForSearch($request->get('word-count'), 'min'));
//                        $sub_query->where('max_word_count', '<=', ViewHelper::getMinMaxForSearch($request->get('word-count'), 'max'));
//                    });
//                    $this->search_params['word-count'] = $request->get('word-count');
//                }
//                if ($request->has('standard-rate')) {
//                    $query->where(function ($sub_query) use ($request) {
//                        $sub_query->where('standard_rate', '>=', ViewHelper::getMinMaxForSearch($request->get('standard-rate'), 'min'));
//                        $sub_query->where('standard_rate', '<=', ViewHelper::getMinMaxForSearch($request->get('standard-rate'), 'max'));
//                    });
//                    $this->search_params['standard-rate'] = $request->get('standard-rate');
//                }
//            })
//            ->paginate($pagination);
//
//        $data['params'] = $this->search_params;
//
//        return $data;
//    }


    public function getSearchData(Request $request)
    {
        $records = WritingRates::select(
            DB::raw("CASE
                          WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
                          ELSE writing_rates.category_name_overwrite
                      END as category_name"),
            'writing_rates.id', 'writing_rates.category_name_overwrite', 'writing_rates.word_count_type',
            'writing_rates.min_word_count', 'writing_rates.max_word_count', 'writing_rates.standard_rate',
            'writing_rates.status', 'category.title')
            ->leftjoin('category', 'category.id','=','writing_rates.category_id')
            ->where(function ($query) use ($request) {
                if ($request->has('category_name')) {
                    $query->orWhere(function ($sub_query) use ($request) {
                        $sub_query->where('category.title', 'like', '%' . $request->get('category_name') . '%');
                        $sub_query->orWhere('writing_rates.category_name_overwrite', 'like', '%' . $request->get('category_name') . '%');
                    });
                }
                if ($request->has('status')) {
                    if ($request->get('status') != 'all')
                        $query->where('writing_rates.status', $request->get('status') == 'active'?1:0);
                }
                if($request->get('min_word_count')) {
                    $query->where('writing_rates.min_word_count','>=', $request->get('min_word_count'));
                }
                if($request->get('max_word_count')) {
                    $query->where('writing_rates.max_word_count','<=', $request->get('max_word_count'));
                }
                if($request->get('min_standard_rate')) {
                    $query->where('writing_rates.standard_rate','>=', $request->get('min_standard_rate'));
                }
                if($request->get('max_standard_rate')) {
                    $query->where('writing_rates.standard_rate','<=', $request->get('max_standard_rate'));
                }
            })
            ->get();

        return $records;
    }


    public function createNewWritingRates($request)
    {
        WritingRates::create([
            'category_id'             => $request->get('category_id'),
            'category_name_overwrite' => $request->get('category_name_overwrite'),
            'standard_rate'           => $request->get('standard_rate'),
            'status'                  => $request->get('status'),
            'created_by'              => auth()->user()->id,
            'word_count_type'         => $request->get('word_count_type'),
            'min_word_count'          => $request->get('min_word_count'),
            'max_word_count'          => $request->get('min_word_count'),
            'description'             => $request->get('description'),
        ]);

        return true;
    }

    public function updateWritingRates($model, $request)
    {
        $model->update([
            'category_id'             => $request->get('category_id'),
            'category_name_overwrite' => $request->get('category_name_overwrite'),
            'standard_rate'           => $request->get('standard_rate'),
            'status'                  => $request->get('status'),
            'updated_by'              => auth()->user()->id,
            'word_count_type'         => $request->get('word_count_type'),
            'min_word_count'          => $request->get('min_word_count'),
            'max_word_count'          => $request->get('min_word_count'),
            'description'             => $request->get('description'),
        ]);
    }

}
