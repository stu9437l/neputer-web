<?php


namespace App\MyLibraries\service;


use App\Model\WhyUs;

class WhyUsService
{
    /**
     * @var WhyUs
     */
    protected $model;

    public function __construct()
    {
        $this->model = new WhyUs();
    }

    public function getWhyUsSection()
    {
        return $this->model->select('title','description','images','priority')->orderBy('priority')->limit(4)->get();
    }

    public function getAllWhyUs($request)
    {
        return $this->model->select('id','title','created_at','updated_at','priority')
            ->where(function ($query) use ($request) {

            if ($request->has('filter_title') && $request->get('filter_title')) {
                $query->where('why_us.title', 'like', '%' . $request->get('filter_title') . '%');
            }

            if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                $query->where('why_us.created_at', 'like', $request->get('filter_created_at') . '%');
            }

            if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                $query->where('why_us.updated_at', 'like', $request->get('filter_updated_at') . '%');
            }
        })
            ->orderBy('priority','ASC')
            ->paginate(20);
    }


}