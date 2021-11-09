@extends('frontend.layouts.master')

@section('title','Blog Category')


@section('content')

    <!--Breadcrumb Area-->
    @include('frontend.layouts.breadcrumb',[
       'page'=>'Blog Blog Category',
       'title'=> 'Our Latest News',
       'banner'=> 'blog_banner'
   ])
    <!--End Breadcrumb Area-->

    <!--Start Blog Details-->
    <section class="blog-page pad-tb">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="pr--100">
                        @include('frontend.blog-category.includes.blog')
                    </div>
                </div>
                <!--End Blog Details-->
                <!--Start Sidebar-->
                       @include('frontend.blog-category.includes.sideBlog')
                <!--End Sidebar-->
            </div>
        </div>
    </section>

@endsection