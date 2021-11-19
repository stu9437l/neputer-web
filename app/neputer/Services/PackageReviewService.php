<?php

namespace Neputer\Services;
use Illuminate\Http\Request;
use Neputer\Entities\PackageReview;
use Neputer\Entities\Page;

/**
 * Class PageService
 * @package Neputer\Services
 */
class PackageReviewService extends BaseService
{

    /**
     * The Page instance
     *
     * @var $model
     */
    protected $model;

    /**
     * PageService constructor.
     * @param Page $packageReview
     */
    public function __construct(PackageReview $packageReview)
    {
        $this->model = $packageReview;
    }

    public function getListReview($package_id)
    {
        $records = $this->model->select(['package_reviews.id','full_name','package_reviews.email','star','package_id','comment','package_reviews.status','packages.title'])
            ->join('packages','packages.id', '=','package_reviews.package_id')
            ->where('package_reviews.package_id',$package_id)
            ->get();

        return $records;
    }

    public function getShowData($package_id,$id)
    {

        $records = $this->model->select('package_reviews.id','full_name','packages.business_id','package_reviews.email','star','package_id','comment','package_reviews.status','packages.title')
            ->join('packages','packages.id', '=','package_reviews.package_id')
            ->where('package_reviews.package_id',$package_id)
            ->find($id);

//        dd($records);

        return $records;
    }

    public function getReview(Request $request)
    {
        $records = $this->model->select(['package_reviews.id','full_name','package_reviews.email','star','package_id','comment','package_reviews.status','packages.title'])
            ->join('packages','packages.id', '=','package_reviews.package_id')
            ->join('businesses','businesses.id', '=','packages.business_id')
            ->where(function ($query) use ($request) {
                if ($request->get('query')) {
                    $query->where('package_reviews.status', 'pending');
                }
            })
            ->orderBy('package_reviews.created_at', 'desc')
            ->byUser()
            ->get();

        return $records;
    }
    public function getRecentReview()
    {
        $records = $this->model->select(['package_reviews.id','full_name','package_reviews.email','star','package_id','comment','package_reviews.status','packages.title'])
            ->join('packages','packages.id', '=','package_reviews.package_id')
            ->join('businesses','businesses.id', '=','packages.business_id')
            ->byUser()
            ->orderBy('id','desc')
            ->limit(15)
            ->get();

        return $records;
    }

    public function showReview($id)
    {
        $records = $this->model->select(['package_reviews.id','full_name','package_reviews.email','star','package_id','comment','package_reviews.status','packages.title'])
            ->join('packages','packages.id', '=','package_reviews.package_id')
            ->join('businesses','businesses.id', '=','packages.business_id')
            ->find($id);


        return $records;
    }





}
