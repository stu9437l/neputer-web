<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Business;
use Neputer\Entities\BusinessReview;
use Neputer\Entities\Package;


/**
 * Class PackageService
 * @package Neputer\Services
 */
class BusinessService extends BaseService
{
    /**
     * The package instance
     *
     * @var $model
     */
    protected $model;


    /**
     * PackageService constructor.
     * @param Business $business
     */
    public function __construct(Business $business)
    {
        $this->model = $business;
    }

    /**
     * normal data fetching
     * @return mixed
     */

    public function index($id)
    {
        $data = [];
//      dd('this is '.$id);
        return $data['row'] = $this->model->where('user_id',$id)->first();
    }

    public function searchResults(Request $request)
    {
        $business_id = $request->get('id');
        $records = BusinessReview::select(['business_reviews.id', 'full_name', 'business_reviews.email', 'comment', 'star', 'business_id','businesses.business_name'])
            ->join('businesses','businesses.id','=','business_reviews.business_id')
            ->where('business_id',$business_id)
            ->get();
        return $records;
    }

    public function getListOfBusiness()
    {
        return $this->model->select('businesses.*','users.name')
            ->join('users','users.id','=','businesses.user_id')
            ->get();
    }




    public function show($id)
    {
        $this->idExist($id);
        return $data['row'] = $this->model->find($id);
    }

    public function view($id)
    {
        $this->idExist($id);
        return $this->model->where('id', $id)->get();
    }

    public function viewPackage($id)
    {
        $this->idExist($id);
        return Package::select('packages.*')
            ->join('businesses', 'businesses.id', '=', 'packages.business_id')
            ->where('businesses.id', '=', $id)->get();
    }


    public function idExist($id)
    {
        return $this->model::findOrFail($id);
    }

    /**
     * pluck business
     */
    public function pluckBusiness()
    {
        return $this->model->pluck('business_name','id');
    }

    public function getUserBusiness($user_id)
    {
    return $this->model->select('id')->where('user_id',$user_id)->first();
    }



}
