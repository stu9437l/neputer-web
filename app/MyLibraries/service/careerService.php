<?php


namespace App\MyLibraries\service;


use App\Model\Career;
use App\Model\CareerForm;
use Illuminate\Http\Request;

class careerService
{
    /**
     * @var Career
     */
    protected $model;
    /**
     * @var CareerForm
     */
    protected $careerForm;

    public function __construct()
    {
        $this->model = new Career();
        $this->careerForm = new CareerForm();
    }

    /* For Admin */
    public function getAllCareer($request)
    {

      return  $this->model
          ->where(function ($query) use ($request) {

              if ($request->has('filter_title') && $request->get('filter_title')) {
                  $query->where('career.title', 'like', '%' . $request->get('filter_title') . '%');
              }
              if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                  $query->where('career.status', $request->get('filter_status') == 'active' ? 1 : 0);
              }
              if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                  $query->where('career.created_at', 'like', $request->get('filter_created_at') . '%');
              }

              if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                  $query->where('career.updated_at', 'like', $request->get('filter_updated_at') . '%');
              }
          })
      ->orderBy('priority')->paginate(5);
    }

    public function store(array $validated)
    {
       return $this->model->create($validated);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update(array $all, $id)
    {
       return $this->model->where('id', $id)->update($all);
    }

    public function findOrfailCareer($id , $method)
    {
        $data = [];
        $data['row'] = $this->find($id);

        if($data['row'] == null || $data['row']->status == 0) {
            session()->flash('error-message', "Career unable to ".$method);
            return false;
        }
        return $data['row'];

    }

    public function destroy($id)
    {
        $this->model->where('status',1)->delete($id);
    }

    public function pluckManageRank()
    {
        return $this->model->pluck('title','id');
    }

    public function getCareerFrontend($limit)
    {
        return $this->model->where('status',1)->limit($limit)->orderBy('priority')->get();
    }
/* Career Form Store and display */
    public function formStore(array $validated)
    {
       return $this->careerForm->create($validated);
    }
    public function getAllCareerMessage($request)
    {

        return  $this->careerForm
            ->where(function ($query) use ($request) {
                if($request->has('filter_name') && $request->get('filter_name')){
                    $query->where('career_forms.name','like','%'.$request->get('filter_name').'%');
                }

                if($request->has('filter_email') && $request->get('filter_email')){
                    $query->where('career_forms.email', 'like', '%'. $request->get('filter_email'). '%');
                }

                if($request->has('filter_message') && $request->get('filter_message')){
                    $query->where('career_forms.message', 'like', '%'.$request->get('filter_message').'%');
                }

                if($request->has('filter_created_at') && $request->get('filter_created_at')){
                    $query->where('career_forms.created_at', 'like', '%'.$request->get('filter_created_at').'%');
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('career_forms.status', $request->get('filter_status') == 'seen' ? 1 : 0);
                }

            })
            ->latest()
           ->paginate(10);
    }


}