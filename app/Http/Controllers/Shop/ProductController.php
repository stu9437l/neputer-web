<?php

namespace App\Http\Controllers\Shop;

use App\Facades\AppHelperFacade;
use App\Model\Attributes;
use App\Model\Category;
use App\Model\Group;
use App\Model\Product;
use App\Model\ProductAttributes;
use App\Model\ProductReviews;
use App\Model\ProductSectionType;
use App\MyLibraries\HelperClass\AppHelper;
use Illuminate\Http\Request;

class ProductController extends BaseController
{

    protected $id;

    protected $sort_by = [
        'title', 'price'
    ];

    protected $sort_key = [
        'asc', 'desc'
    ];


    public function index(Request $request, $slug)
    {
        $data = [];
        $limit = AppHelperFacade::getSiteConfigByKey('product_load_more_limit');
        $data['parentCategoryWise'] = true;
        $data['parentCategory'] = Category::where('slug', $slug)->first();
        $results = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as p', 'p.id', '=', 'categories.id')
            ->join('categories as c', 'c.parent_id', '=', 'p.id')
            ->join('products', 'products.category_id', '=', 'c.id')
            ->where('categories.id', $data['parentCategory']->id);

        $data['rows'] = $results->limit($limit)->get();
        $data['productCount'] = $results->count();
        $data['categoryList'] = $data['parentCategory']->children;

        return view('shop.product.index', compact('data', 'limit'));
    }

    public function productList(Request $request, $parent_slug, $child_slug)
    {
        $data = [];
        $limit = AppHelperFacade::getSiteConfigByKey('product_load_more_limit');
        $data['childCategoryWise'] = true;
        $data['category'] = Category::where('slug', $child_slug)
            ->first();

        $results = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as c', 'c.id', '=', 'categories.id')
            ->join('categories as p', 'p.id', '=', 'c.parent_id')
            ->join('products', 'products.category_id', '=', 'c.id')
            ->where('categories.id', $data['category']->id);

        $data['rows'] = $results->limit($limit)->get();
        $data['productCount'] = $results->count();

        return view('shop.product.list', compact('data', 'limit'));

    }

    /**
     * @param Request $request
     */
    public function search(Request $request)
    {
        $data = [];
        $response = [];
        $limit = AppHelperFacade::getSiteConfigByKey('product_load_more_limit');
        if ($request->ajax()) {
            $result = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
                'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
                ->join('categories as p', 'p.id', '=', 'categories.id')
                ->join('categories as c', 'c.parent_id', '=', 'p.id')
                ->join('products', 'products.category_id', '=', 'c.id')
//                ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//                ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
                ->where(function ($query) use ($request) {
                    if ($title = $request->get('title')) {
                        $query->where('products.title', 'like', '%' . $title . '%');
//                            ->orWhere('tags.title', 'like', '%' . $title . '%');
                    }
                    if ($category = $request->get('category')) {
                        $query->whereIn('products.category_id', $category);
                    }
                    if ($category = $request->get('category')) {
                        $query->whereIn('products.category_id', $category);
                    }
                    if (!is_null($min_price = $request->get('min_price'))) {
                        $query->where('products.new_price', '>=', $min_price);
                    }
                    if (!is_null($max_price = $request->get('max_price'))) {
                        $query->where('products.new_price', '<=', $max_price);

                    }
                })
                ->orderBy($this->getOrderByColumn('products'), 'ASC')
                ->where('products.status', 1);

            if ($request->get('fromParentCategory') == true) {
                $data['rows'] = $result->where('categories.id', $request->get('parent_id'))->limit($limit)->get();
                $response['countProduct'] = $this->countParentCatProduct($request, $request->get('parent_id'));
            } else if ($request->get('fromChildCategory') == true) {
                $data['rows'] = $result->where('products.category_id', $request->get('category_id'))->limit($limit)->get();
                $response['countProduct'] = $this->countChildCatProduct($request, $request->get('category_id'));
            } else {
                $data['rows'] = $result->limit($limit)->get();
                $response['countProduct'] = $this->countAllProducts($request);
            }


            $response['offset'] = $request->get('offset') + $limit;
            if ($response['offset'] >= $response['countProduct']) {
                $response['button_hide'] = false;
            }

            $response['html'] = view('shop.product.list.filter_product_list', compact('data'))->render();
        } else {

            //for header search
            $limit = AppHelperFacade::getSiteConfigByKey('product_load_more_limit');
            $result = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
                'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
                ->join('categories as p', 'p.id', '=', 'categories.id')
                ->join('categories as c', 'c.parent_id', '=', 'p.id')
                ->join('products', 'products.category_id', '=', 'c.id')
//                ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//                ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
                ->where(function ($query) use ($request) {
                    if ($title = $request->get('title')) {
                        $query->orWhere('products.title', 'like', '%' . $title . '%');
//                            ->orWhere('tags.title', 'like', '%' . $title . '%');
                    }
                })
                ->where('products.status', 1);

            $data['rows'] = $result->limit($limit)->get();
            $data['productCount'] = $result->count();
            $data['categoryList'] = Category::whereNotIn('parent_id', [0])->get();
            return view('shop.product.search', compact('data', 'limit'));
        }
        return response()->json($response);
    }

    public function detail(Request $request, $parent_slug, $cat_slug, $prod_slug)
    {
        $data = [];

        $data['product'] = Product::select('id', 'category_id', 'title', 'slug', 'quantity', 'main_image', 'new_price', 'old_price', 'long_desc', 'short_desc')
            ->where('slug', $prod_slug)
            ->Status()
            ->first();
        $data['productSectionTypes'] = ProductSectionType::Status()
            ->OrderByRankAsc()
            ->get();

        $data['product_images'] = $data['product']->galleries()->get();
//        dd($data['product_images']);
        $data['product_attributes'] = $this->prepareAttributeList($data['product']->id, $prod_slug);
        $data['product_reviews'] = ProductReviews::select('id', 'product_id', 'rating', 'name', 'email', 'comment', 'created_at')
            ->where('product_id', $data['product']->id)
            ->get();

        return view('shop.product.detail', compact('data'));

    }

    protected function getOrderByColumn($table)
    {
        $request = request();

        if ($request->has('sort_by') && $request->get('sort_by')) {

            if (in_array($request->get('sort_by'), $this->sort_by)) {
                switch ($request->get('sort_by')) {
                    case 'price':
                        return $table . '.new_price';
                        break;

                    case 'title':
                        return $table . '.title';
                        break;

                    default:
                        return $table . '.' . $request->get('sort_by');
                }

            } else {
                return $table . '.id';
            }

        } else {
            return $table . '.id';
        }
    }

    protected function prepareAttributeList($product_id, $slug)
    {

        $data = [];
        $data['product_attributes'] = ProductAttributes::where('product_id', $product_id)->orderBy('attribute_id')->get();
        $product_details = [];
        if ($data['product_attributes']->count() > 0) {
            foreach ($data['product_attributes'] as $product_attribute) {
                $data['attribute'] = Attributes::select('id', 'group_id', 'title')->where('id', $product_attribute->attribute_id)->first();
                $data['group'] = Group::select('title')->where('id', $data['attribute']->group_id)->pluck('title')->first();
                $product_details[$data['group']][] = [
                    'group_title' => $data['group'],
                    'attribute_id' => $data['attribute']->id,
                    'attribute_title' => $data['attribute']->title,
                    'weight' => $product_attribute->weight,
                    'new_price' => $product_attribute->new_price,
                    'old_price' => $product_attribute->old_price,
                    'remarks' => $product_attribute->remarks,
                ];
            }
        }

        return $product_details;
    }

    /**
     * @param Request $request
     */
    public function getPrice(Request $request)
    {
        $data = [];
        $product_id = $request->get('product_id');
        $attribute_id = $request->get('attribute_id');
        $weight = $request->get('weight');
        $data['product'] = \DB::table('product_attribute')->select('new_price', 'old_price')
            ->where('product_id', $product_id)
            ->where('attribute_id', $attribute_id)
            ->where('weight', $weight)
            ->first();
        $response = [];
        $response['html'] = view('shop.product.includes.price', compact('data'))->render();

        return response()->json($response);
    }

    /**
     * @param Request $request
     */
    public function loadMoreProducts(Request $request)
    {
        $data = [];
        $response = [];
        $data['no_data'] = false;
        $data['error'] = false;
        $limit = AppHelperFacade::getSiteConfigByKey('product_load_more_limit');
        $offset = $request->get('offset');
        $result = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as p', 'p.id', '=', 'categories.id')
            ->join('categories as c', 'c.parent_id', '=', 'p.id')
            ->join('products', 'products.category_id', '=', 'c.id')
//            ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//            ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
            ->where(function ($query) use ($request) {
                if ($title = $request->get('title')) {
                    $query->where('products.title', 'like', '%' . $title . '%');
//                        ->orWhere('tags.title', 'like', '%' . $title . '%');
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if (!is_null($min_price = $request->get('min_price'))) {
                    $query->where('products.new_price', '>=', $min_price);
                }
                if (!is_null($max_price = $request->get('max_price'))) {
                    $query->where('products.new_price', '<=', $max_price);

                }
            })
            ->orderBy($this->getOrderByColumn('products'), 'ASC')
            ->where('products.status', 1);

        if ($request->get('fromParentCategory') == true) {
            $data['rows'] = $result->where('categories.id', $request->get('parent_id'))->limit($limit)->offset($offset)->get();
            $response['countProduct'] = $this->countParentCatProduct($request, $request->get('parent_id'));
        } else if ($request->get('fromChildCategory') == true) {
            $data['rows'] = $result->where('products.category_id', $request->get('category_id'))->limit($limit)->offset($offset)->get();
            $response['countProduct'] = $this->countChildCatProduct($request, $request->get('category_id'));
        } else {
            $data['rows'] = $result->limit($limit)->offset($offset)->get();
            $response['countProduct'] = $this->countAllProducts($request);
        }

        $response['offset'] = $offset + $limit;
        if ($response['offset'] >= $response['countProduct']) {
            $response['button_hide'] = true;
        }

        $response['html'] = view('shop.product.includes.load-more-products', compact('data'))->render();
        return response()->json($response);
    }

    public function countParentCatProduct(Request $request, $parent_id)
    {
        $totalProducts = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as p', 'p.id', '=', 'categories.id')
            ->join('categories as c', 'c.parent_id', '=', 'p.id')
            ->join('products', 'products.category_id', '=', 'c.id')
//            ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//            ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
            ->where(function ($query) use ($request) {
                if ($title = $request->get('title')) {
                    $query->where('products.title', 'like', '%' . $title . '%');
//                        ->orWhere('tags.title', 'like', '%' . $title . '%');
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if (!is_null($min_price = $request->get('min_price'))) {
                    $query->where('products.new_price', '>=', $min_price);
                }
                if (!is_null($max_price = $request->get('max_price'))) {
                    $query->where('products.new_price', '<=', $max_price);

                }
            })
            ->where('categories.id', $parent_id)
            ->count();

        return $totalProducts;
    }

    public function countChildCatProduct(Request $request, $category_id)
    {
        $totalProducts = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as c', 'c.id', '=', 'categories.id')
            ->join('categories as p', 'p.id', '=', 'c.parent_id')
            ->join('products', 'products.category_id', '=', 'c.id')
//            ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//            ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
            ->where(function ($query) use ($request) {
                if ($title = $request->get('title')) {
                    $query->where('products.title', 'like', '%' . $title . '%');
//                        ->orWhere('tags.title', 'like', '%' . $title . '%');
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if (!is_null($min_price = $request->get('min_price'))) {
                    $query->where('products.new_price', '>=', $min_price);
                }
                if (!is_null($max_price = $request->get('max_price'))) {
                    $query->where('products.new_price', '<=', $max_price);

                }
            })
            ->where('categories.id', $category_id)
            ->count();

        return $totalProducts;
    }

    public function countAllProducts(Request $request)
    {
        $totalProducts = Category::select('products.id', 'products.category_id', 'products.title', 'products.slug', 'products.main_image',
            'products.new_price', 'products.old_price', 'categories.id as cat_id', 'p.slug as parent_slug', 'c.slug as child_slug')
            ->join('categories as p', 'p.id', '=', 'categories.id')
            ->join('categories as c', 'c.parent_id', '=', 'p.id')
            ->join('products', 'products.category_id', '=', 'c.id')
//            ->leftJoin('product_tag', 'product_tag.product_id', '=', 'products.id')
//            ->leftJoin('tags', 'tags.id', '=', 'product_tag.tag_id')
            ->where(function ($query) use ($request) {
                if ($title = $request->get('title')) {
                    $query->where('products.title', 'like', '%' . $title . '%');
//                        ->orWhere('tags.title', 'like', '%' . $title . '%');
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if ($category = $request->get('category')) {
                    $query->whereIn('products.category_id', $category);
                }
                if (!is_null($min_price = $request->get('min_price'))) {
                    $query->where('products.new_price', '>=', $min_price);
                }
                if (!is_null($max_price = $request->get('max_price'))) {
                    $query->where('products.new_price', '<=', $max_price);

                }
            })
            ->orderBy($this->getOrderByColumn('products'), 'ASC')
            ->where('products.status', 1)
            ->count();
        return $totalProducts;
    }

}
