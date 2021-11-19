<?php

namespace Neputer\Services;

use App\Helper\AppHelper;
use App\Helper\ViewHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Neputer\Entities\WriterRates;

/**
 * Class WriterRatesService
 * @package Neputer\Services
 */
class WriterRatesService extends BaseService
{

    /**
     * The WriterRates instance
     *
     * @var $model
     */
    protected $model;
    protected $search_params = [];

    /**
     * WriterRatesService constructor.
     * @param WriterRates $writerrates
     */
    public function __construct(WriterRates $writerrates)
    {
        $this->model = $writerrates;
    }

//    public function getSearchDataWithPaginate($request, $pagination = 10)
//    {
//        $data = [];
//        $data['rows'] = WriterRates::select(\DB::raw("
//                       CASE
//                           WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
//                           ELSE writing_rates.category_name_overwrite
//                       END as category_name"
//        ), 'writing_rates.word_count_type', 'writing_rates.min_word_count', 'writing_rates.max_word_count',
//            'writing_rates.standard_rate', 'writing_rates.category_name_overwrite',
//            'category.title',
//            'writer_rates.id', 'writer_rates.rate_overwrite', 'writer_rates.effective_from_date', 'writer_rates.status',
//            DB::raw('CONCAT_WS(" ", users.name) AS full_name'))
//            ->join('users', 'users.id','=', 'writer_rates.users_id')
//            ->join('writing_rates', 'writing_rates.id', '=', 'writer_rates.writing_rates_id')
//            ->join('category', 'category.id', '=', 'writing_rates.category_id')
//            ->where(function ($query) use ($request) {
//                if ($request->has('name')) {
//                    $query->where(function ($query) use ($request){
//                        $query->orWhere('users.name', 'like', '%' . $request->get('name') . '%');
//                    });
//                    $this->search_params['name'] = $request->get('name');
//                }
//                if ($request->has('writing-rate')) {
//                    $query->where(function ($query) use ($request){
//                        $query->orWhere('category.title', 'like', '%' . $request->get('writing-rate') . '%');
//                        $query->orWhere('writing_rates.category_name_overwrite', 'like', '%' . $request->get('writing-rate') . '%');
//
//                    });
//                    $this->search_params['writing-rate'] = $request->get('writing-rate');
//                }
//                if ($request->has('rate-overwrite')) {
//                    $query->where('writer_rates.rate_overwrite', 'like', '%' . $request->get('rate-overwrite') . '%');
//                    $this->search_params['rate-overwrite'] = $request->get('rate-overwrite');
//                }
//                if ($request->has('from')) {
//                    $query->where('writer_rates.effective_from_date', '>=', AppHelper::formatDate('Y-m-d', $request->get('from')));
//                    $this->search_params['from'] = $request->get('from');
//                }
//                if ($request->has('to')) {
//                    $query->where('writer_rates.effective_from_date', '<=', AppHelper::formatDate('Y-m-d', $request->get('to')));
//                    $this->search_params['to'] = $request->get('to');
//                }
//            })->paginate($pagination);
//
//        $data['params'] = $this->search_params;
//
//        return $data;
//    }


    public function getSearchData(Request $request)
    {
        $records = WriterRates::select(DB::raw("
                       CASE
                           WHEN writing_rates.category_name_overwrite IS NULL THEN category.title
                           ELSE writing_rates.category_name_overwrite
                       END as category_name"
        ), 'writing_rates.word_count_type', 'writing_rates.min_word_count', 'writing_rates.max_word_count',
            'writing_rates.standard_rate', 'writing_rates.category_name_overwrite',
            'category.title',
            'writer_rates.id', 'writer_rates.rate_overwrite', 'writer_rates.effective_from_date', 'writer_rates.status',
            DB::raw('CONCAT_WS(" ", users.first_name, users.middle_name, users.last_name) AS full_name'))
            ->join('users', 'users.id','=', 'writer_rates.users_id')
            ->join('writing_rates', 'writing_rates.id', '=', 'writer_rates.writing_rates_id')
            ->join('category', 'category.id', '=', 'writing_rates.category_id')
            ->where(function ($query) use ($request) {
                if ($id = $request->get('id')) {
                    $query->where('writer_rates.id', $id);

                }
                if ($name = $request->get('name')) {
                    $query->where('users.id', $name);

                }
                if ($writing_rate =$request->get('writing_rate')) {
                    $query->where('writing_rates.id', $writing_rate);
                }
                if ($request->get('rate_overwrite')) {
                    $query->where('writer_rates.rate_overwrite', 'like', '%' . $request->get('rate_overwrite') . '%');
                }
//                if ($request->has('from')) {
//                    $query->where('writer_rates.effective_from_date', '>=', AppHelper::formatDate('Y-m-d', $request->get('from')));
//                }
//                if ($request->has('to')) {
//                    $query->where('writer_rates.effective_from_date', '<=', AppHelper::formatDate('Y-m-d', $request->get('to')));
//                }
                if ($request->has('status')) {
                    if ($request->get('status') != 'all')
                        $query->where('writer_rates.status', $request->get('status') == 'active'?1:0);
                }
            })
            ->get();

        return $records;
    }

    public function createNewWriterRates($request)
    {
        WriterRates::create([
            'users_id'            => $request->get('users_id'),
            'writing_rates_id'    => $request->get('writing_rates_id'),
            'rate_overwrite'      => $request->get('rate_overwrite'),
            'effective_from_date' => $request->get('effective_from_date'),
            'status'              => $request->get('status'),
            'created_by'          => auth()->user()->id,
        ]);

        return true;
    }

    public function updateWriterRates($model, $request)
    {
        $model->update([
            'users_id'            => $request->get('users_id'),
            'writing_rates_id'    => $request->get('writing_rates_id'),
            'rate_overwrite'      => $request->get('rate_overwrite'),
            'effective_from_date' => $request->get('effective_from_date'),
            'status'              => $request->get('status'),
            'updated_by'          => auth()->user()->id,
        ]);
        return true;
    }

}
