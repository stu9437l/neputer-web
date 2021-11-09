@extends('frontend.layouts.master')

@section('title', 'Blog Detail Page')

@section('content')
<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'title'=> $data['blog-detail']->title,
    'page'=>'Blog Detail',
    'banner'=>null
])
<!--End Breadcrumb Area-->
<!--Start Blog Details-->
<section class="blog-page pad-tb">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="blog-header">
                    <h1>{{ $data['blog-detail']->title }}</h1>
                    <div class="row mt20 mb20">
                        <div class="col-md-8 col-9">
                            <div class="media">
                                <div class="user-image bdr-radius"><img src="{{ asset('Frontend/images/user-thumb/girl.jpg') }}" alt="girl" class="img-fluid" /></div>
                                <div class="media-body user-info">
                                    <h5>By John Doe</h5>
                                    <p>January 10, 2020</p>
                                </div>
                            </div>
                        </div>
{{--                        <div class="col-md-4 col-3">--}}
{{--                            <div class="postwatch"><i class="far fa-eye"></i> 120</div>--}}
{{--                        </div>--}}
                    </div>
                </div>
                <div class="image-set"><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('blog',$data['blog-detail']->image) }}" alt="blog images" class="img-fluid" /></div>
                <div class="blog-content mt30">
                   {!! $data['blog-detail']->description !!}

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

@push('js')
      @include('frontend.blog-category.includes.script')
@endpush