<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Slider;

/**
 * Class ProductService
 * @product Neputer\Services
 */
class SliderService extends BaseService
{

    /**
     * The Product instance
     *
     * @var $model
     */
    protected $model;

    /**
     * ProductService constructor.
     * @param Product $product
     */
    public function __construct(Slider $slider)
    {
        $this->model = $slider;
    }

    public function getSearchData(Request $request)
    {
        $records = $this->model->select('id', 'title', 'status')
            ->where('status', '1')
            ->get();

        return $records;
    }


}
