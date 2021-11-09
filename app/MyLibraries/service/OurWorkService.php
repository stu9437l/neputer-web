<?php


namespace App\MyLibraries\service;

use \Illuminate\Http\Request;
use App\Model\OurWork;

class OurWorkService
{
    /**
     * @var OurWork
     */
    protected $model;

    public function __construct()
  {
      $this->model = new OurWork();
  }

    public function getALlOurWork($request)
    {
        return $this->model->where(function ($query) use ($request) {

            if ($request->has('filter_name') && $request->get('filter_name')) {
                $query->where('our_works.name', 'like', '%' . $request->get('filter_name') . '%');
            }

            if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                $query->where('our_works.created_at', 'like', $request->get('filter_created_at') . '%');
            }

            if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                $query->where('our_works.updated_at', 'like', $request->get('filter_updated_at') . '%');
            }

            if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                $query->where('our_works.status', $request->get('filter_status') == 'active' ? 1 : 0);
            }
        })
            ->orderBy('priority', 'ASC')
            ->paginate(20);
    }

    public function storeOurWork(array $all)
    {
        $this->model->create($all);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function updateOurWord(array $all, $id)
    {
       return $this->model->find($id)->update($all);
    }

    public function getOurWorkInHomePage($limit)
    {
       return $this->model->where('status',1)->limit($limit)->orderBy('priority')->get();
    }

}