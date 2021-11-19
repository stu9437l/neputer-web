<?php

namespace Neputer\Services;

use Illuminate\Database\Eloquent\Model;
use Neputer\Entities\History;

/**
 * Class HistoryService
 * @package Neputer\Services
 */
class HistoryService extends BaseService
{

    /**
     * The History instance
     *
     * @var $model
     */
    protected $model;

    /**
     * HistoryService constructor.
     * @param History $history
     */
    public function __construct(History $history)
    {
        $this->model = $history;
    }

    /**
     * @param Model $model
     * @param array $data
     * @return History|\Illuminate\Database\Eloquent\Model
     */
    public function create(Model $model, array $data)
    {
        if ($model) {
            $history = $this->model->create(array_merge([
                'historyable_type'=> get_class($model),
                'historyable_id'  => $model->id
            ], $data));

            return $model->histories()->save($history);
        }
    }


}
