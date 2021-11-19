<?php

namespace Neputer\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Neputer\Services\HistoryService;
use Neputer\Utils\Acl\Entities\Role;

/**
 * Class BaseObserver
 * @package Neputer\Observers
 */
abstract class BaseObserver
{

    /**
     * If true enable updating event ie vice versa
     * @var bool
     */
   // protected $observe = true;

   // protected $historyService;

    /**
     * StudentObserver constructor.
     * @param HistoryService $historyService
     */
//    public function __construct(
//        HistoryService $historyService
//    )
//    {
//        $this->historyService = $historyService;
//    }

//    public function created($model)
//    {
//        app('log')->info('Created     '.get_class($model). ' '. get_class($this));
//        $created_data = $model->getDirty();
//
//        $history = $this->createHistories($model, [
//            'created_by' => auth()->id(),
//            'first_created_data' => $created_data,
//            'last_created_at' => Carbon::now()
//        ]);
//    }
//
//    public function updating($model)
//    {
//        Log::info($model->isDirty());
//
////        app('log')->info(\AppHelper::isDirty($model, request()->only('lead_name')));
//
//
//        if($model->isDirty()){
//
//            $changedData = $model->getDirty();
//            $originalData = $model->getOriginal();
//
//            $this->createHistories($model, [
//                'updated_by'        => auth()->id(),
//                'last_updated_at'   => Carbon::now(),
//                'last_changed_data' => array_only($originalData, array_keys($changedData)),
//                'changed_from'      => $model->toArray()
//            ]);
//
//        }
//
//
//    }
//
//
//    public function deleted($model)
//    {
//
//        $this->createHistories($model, [
//            'deleted_by' => auth()->id(),
//            'last_deleted_at' => Carbon::now()
//        ]);
//    }
//
//    public function createHistories($model, $param)
//    {
//
//        return $this->historyService->create($model, [
//            'meta'            => $param,
//        ]);
//    }

}
