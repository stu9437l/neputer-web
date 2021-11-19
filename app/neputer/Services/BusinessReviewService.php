<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Ads;
use Neputer\Entities\BusinessReview;
use Neputer\Entities\Page;

/**
 * Class PageService
 * @package Neputer\Services
 */
class BusinessReviewService extends BaseService
{

    /**
     * The Page instance
     *
     * @var $model
     */
    protected $model;

    /**
     * PageService constructor.
     * @param Page $businessReview
     */
    public function __construct(BusinessReview $businessReview)
    {
        $this->model = $businessReview;
    }





}
