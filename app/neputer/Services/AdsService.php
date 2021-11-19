<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Neputer\Entities\Ads;

/**
 * Class AdsService
 * @package Neputer\Services
 */
class AdsService extends BaseService
{

    /**
     * The Ads instance
     *
     * @var $model
     */
    protected $model;

    /**
     * AdsService constructor.
     * @param Ads $ads
     */
    public function __construct(Ads $ads)
    {
        $this->model = $ads;
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function getSearchData(Request $request)
    {
        $records = Ads::select(['id', 'title', 'status', 'content', 'ad_type'])
            ->where(function ($query) use ($request) {

                if ($id = $request->get('id')) {
                    $query->where('id', $id);
                }
                if ($ad_type = $request->get('ad_type')) {
                    $query->where('ad_type', $ad_type);
                }
                if ($title = $request->get('title')) {
                    $query->where('title', 'like', '%' . $title . '%');
                }
                if ($request->get('status') != 'all') {
                    $query->where('status', $request->get('status') == 'active'?1:0);
                }

            })->get();

        return $records;
    }
}
