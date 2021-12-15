<?php


namespace App\MyLibraries\service;


use App\Model\Blog;
use Illuminate\Support\Facades\DB;

class blogCategoryService
{

    protected $model;

    public function __construct()
    {
        $this->model = new Blog();
    }

    public function getBlogFrontend()
    {
        return $this->model->where('status',1)->latest()->get();
    }

    public function find($id)
    {
        return $this->model->where('id', $id)->orWhere('slug',$id)->firstOrFail();
    }

    public function getLatestBlog()
    {
        return $this->model->select('id', 'title' , 'image' ,'description','slug','created_at')->latest()->get();
    }

    public function pluckTitleAndCount()
    {
        return $this->model
            ->select('blog_category.title', \DB::Raw('count(blogs.blog_category_id) as total_count'))
            ->join('blog_category','blogs.blog_category_id','=','blog_category.id')
            ->groupBy('blogs.blog_category_id')
            ->get();

    }
}