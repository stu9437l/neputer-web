<?php


namespace App\MyLibraries\service;


use App\Model\DevelopmentProcess;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Array_;

class DevelopmentProcessService
{

    /**
     * @var DevelopmentProcess
     */
    protected $model;

    public function __construct()
    {
        $this->model = new DevelopmentProcess();
    }
    /* For Frontend Users*/
    public function getDevelopmentProcecss()
    {
        return  $this->model->orderBy('priority')->get();
    }

    /* For Backend*/
    public function getAllDevelopmentProcess(Request $request)
    {
        return  $this->model->select(
                'id', 'created_at', 'updated_at', 'description', 'title', 'priority', 'status'
            )
            ->where(function ($query) use ($request) {

                if ($request->has('filter_title') && $request->get('filter_title')) {
                    $query->where('development_process.title', 'like', '%' . $request->get('filter_title') . '%');
                }

                if ($request->has('filter_description') && $request->get('filter_description')) {
                    $query->where('development_process.description', 'like', '%' . $request->get('filter_description') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('development_process.created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('development_process.updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('development_process.status', $request->get('filter_status') == 'active' ? 1 : 0);
                }


            })
            ->orderBy('priority','ASC')
            ->paginate(20);
    }

    public function store(array $all)
    {
        $this->model->create($all);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function manageRank()
    {
      return  $this->model->orderBy('priority')->pluck('title', 'id');
    }


}