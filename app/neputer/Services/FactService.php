<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Fact;

/**
 * Class FactService
 * @package Neputer\Services
 */
class FactService extends BaseService
{

    /**
     * The Fact instance
     *
     * @var $model
     */
    protected $model;

    /**
     * FactService constructor.
     * @param Fact $fact
     */
    public function __construct(Fact $fact)
    {
        $this->model = $fact;
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function getSearchData(Request $request)
    {
        $records = $this->model->select('id', 'title', 'status')
            ->orderBy('order_by')
            ->get();

        return $records;
    }


    public function createNewFact($request)
    {
        $last_fact = $this->model->orderBy('order_by', 'desc')->first();
        $this->model->create([
            'title'      => $request->get('title'),
            'order_by'   => $last_fact?$last_fact->order_by + 10:10,
//            'search'     => $request->get('search'),
            'status'     => $request->get('status'),
            'created_by' => auth()->user()->id,
        ]);

        return true;
    }

    public function updateFact($model, $request)
    {
        $model->update([
            'title'      => $request->get('title'),
//            'search'     => $request->get('search'),
            'status'     => $request->get('status'),
            'updated_by' => auth()->user()->id,
        ]);

        return true;
    }
}
