<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Ads;
use Neputer\Entities\Page;

/**
 * Class PageService
 * @package Neputer\Services
 */
class PageService extends BaseService
{

    /**
     * The Page instance
     *
     * @var $model
     */
    protected $model;

    /**
     * PageService constructor.
     * @param Page $page
     */
    public function __construct(Page $page)
    {
        $this->model = $page;
    }

    /**
     * @param Request $request
     * @return mixed
     */

    public function getSearchData(Request $request)
    {
        $records = $this->model->select(['id', 'title', 'status', 'content', 'page_type'])->orderBy('updated_at','desc')->get();

        return $records;
    }

    public function storePage(Request $request)
    {
        parent::uploadImage($request);
        parent::uploadImageThumbs($request);

        $records = $this->model->create([
            'title' => $request->get('title'),
            'slug' => $request->get('slug'),
            'open_in' => $request->get('open_in'),
            'page_type' => $request->get('page_type'),
            'link' => $request->get('link'),
            'content' => $request->get('content'),
            'image' => $this->image_name,
            'status' => $request->get('status'),
            'hint' => $request->get('hint'),
            'seo_title' => $request->get('seo_title'),
            'seo_desc' => $request->get('seo_desc'),
            'seo_keywords' => $request->get('seo_keywords'),
        ]);

        return $records;
    }
}
