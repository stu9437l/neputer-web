<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Grade;

/**
 * Class GradeService
 * @package Neputer\Services
 */
class GradeService extends BaseService
{

    /**
     * The Grade instance
     *
     * @var $model
     */
    protected $model;

    /**
     * GradeService constructor.
     * @param Grade $grade
     */
    public function __construct(Grade $grade)
    {
        $this->model = $grade;
    }

    public function getData(Request $request)
    {
        $records = $this->model->select(['id', 'title','details'])
            ->get();

        return $records;
    }

    public function pluckGrade()
    {
        return $this->model->pluck('title','id');
    }

}
