@extends('admin.include.layout')

@section('title', 'WhyUs::Create')

@section('content')

     <div class="main-content">
         @include('admin.include.breadcrumb', [
         'base_route' => $base_route.'.index',
         'page'=>'Add'
    ])
         <div class="page-content">
             @include('admin.include.page-header',[
               'base_route'=> $base_route,
               'title'=>$panel,
               'page'=>'Create'
            ])

              <div class="row">
                  <div class="col-xs-12">
                            @include('admin.include.display_flash_data')

                            {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post',
                            'class' => 'form-horizontal', 'role' => 'form', 'id' => 'our-skill-form',
                            'enctype' => 'multipart/form-data'
                            ]) !!}

                            @include($view_path.'.include.form')
                            @include('admin.include.submitButton')

                            <div class="hr hr-24"></div>

                            {!! Form::close() !!}
                        </div>
              </div>
         </div>
     </div>

@endsection
@include('admin.include.dropify')