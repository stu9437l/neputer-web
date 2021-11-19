<?php

namespace Neputer\Observers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Neputer\Services\HistoryService;

/**
 * Class TopicObserver
 * @package Neputer\Observers
 */
class TopicObserver extends BaseObserver
{
    /**
     * If true enable updating event ie vice versa
     * @var bool
     */
    protected $observe = true;

    protected $historyService;

    /**
     * HistoryObserver constructor.
     * @param HistoryService $historyService
     */
    public function __construct(
        HistoryService $historyService
    )
    {
        $this->historyService = $historyService;
    }

    public function created($model)
    {
        app('log')->info('Created     '.get_class($model). ' '. get_class($this));
        $created_data = $model->getDirty();

        $history = $this->createHistories($model, [
            'created_by' => auth()->id(),
            'first_created_data' => $created_data,
            'last_created_at' => Carbon::now()
        ]);

        if ($history) {
            DB::table('history_topic')->insert([
                'created_at' => Carbon::now(),
                'topic_id' => $created_data['id'],
                'task_done_status' => $created_data['task_done_status'] ?? '',
                'user_id' => auth()->user()->id ?? 1,
                'history_id' => $history->id,
            ]);
        }
    }

    public function updating($model)
    {
        Log::info($model->isDirty());
        if($model->isDirty()){

            $changedData = $model->getDirty();
            $originalData = $model->getOriginal();

            if (array_keys($changedData) != ['page_view_count']) {

                $history = $this->createHistories($model, [
                    'updated_by'        => auth()->id(),
                    'last_updated_at'   => Carbon::now(),
                    'last_changed_data' => array_only($originalData, array_keys($changedData)),
                    'changed_from'      => $model->toArray()
                ]);

                DB::table('history_topic')->insert([
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'topic_id' => $originalData['id'],
                    'task_done_status' => $changedData['task_done_status']??$originalData['task_done_status'],
                    'user_id' => auth()->user()->id,
                    'history_id' => $history->id,
                ]);

            }

        }
    }


    public function deleted($model)
    {

        $this->createHistories($model, [
            'deleted_by' => auth()->id(),
            'last_deleted_at' => Carbon::now()
        ]);
    }

    public function createHistories($model, $param)
    {

        return $this->historyService->create($model, [
            'meta'            => $param,
        ]);
    }
}

