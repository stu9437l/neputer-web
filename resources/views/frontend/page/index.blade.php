@extends('frontend.layouts.master')

@section('title', $data['row']->seo_title)
@section('keywords', $data['row']->seo_keys)
@section('description', $data['row']->seo_desc)

@section('content')

<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'page'=> $data['row']->title,
    'title'=> $data['row']->title,
    'banner'=> $data['row']->image
])

<section class="about-sec bg-gradient5 pad-tb">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-10">
                <div class="common-heading">
                    <p>{!! $data['row']->content !!} </p>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
