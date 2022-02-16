@extends('frontend.layouts.master')

@section('title', $_settings['teams_page_seo_title'] ?? 'Our Teams')
@section('keywords', $_settings['teams_page_seo_keywords'] ?? 'Our Teams')
@section('description', $_settings['teams_page_seo_description'] ?? 'Our Teams')


@section('content')


<!--End Header -->
<!--Breadcrumb Area-->
@include('frontend.layouts.breadcrumb',[
    'title'=>  'Our Team',
    'description'=> 'Our Team',
    'banner'=>'our_team_image'
])

<!--End Breadcrumb Area-->
<!--Start Team Leaders-->
{{-- @include('frontend.our-team.includes.team-leader')--}}
<!--End Team Leaders-->

<!--Start Team Members-->
@include('frontend.our-team.includes.team-member')
<!--End Team Members-->
@endsection