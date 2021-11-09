<?php


namespace App\Http\Controllers\Frontend;


use App\MyLibraries\service\blogCategoryService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\View\View;

class BlogController
{
    /**
     * @var blogCategoryService
     */
    protected $blogCategoryService;

    public function __construct(blogCategoryService $blogCategoryService)
    {
        $this->blogCategoryService = $blogCategoryService;
    }

    public function index()
    {
        $data = [];
        $data['blog'] = $this->blogCategoryService->getBlogFrontend();
        $data = array_merge($data, $this->getSideBlogDetails());
        return view('frontend.blog-category.index',compact('data'));
    }

    /**
     * @param $slug
     * @return Factory|Application|View
     */
    public function show($slug)
    {
        $data = [];
        $data['blog-detail'] = $this->blogCategoryService->find($slug);
        $data = array_merge($data, $this->getSideBlogDetails());
        return view('frontend.blog-category.show',compact('data'));
    }

    /**
     * @return array
     */
    public function getSideBlogDetails(): array
    {
        $data['latest-blog'] = $this->blogCategoryService->getLatestBlog();
        $data['title_count'] = $this->blogCategoryService->pluckTitleAndCount();
        return $data;
    }

}