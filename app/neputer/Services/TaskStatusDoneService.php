<?php

namespace Neputer\Services;

use Neputer\Entities\TaskStatusDone;

/**
 * Class TaskStatusDoneService
 * @package Neputer\Services
 */
class TaskStatusDoneService extends BaseService
{

    /**
     * The TaskStatusDone instance
     *
     * @var $model
     */
    protected $model;

    /**
     * TaskStatusDoneService constructor.
     * @param TaskStatusDone $taskstatusdone
     */
    public function __construct(TaskStatusDone $taskstatusdone)
    {
        $this->model = $taskstatusdone;
    }

}
