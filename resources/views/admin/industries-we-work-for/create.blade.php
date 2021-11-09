@extends('admin.include.layout')

@section('title', 'Industries We Work For::Create')

@section('content')
<div class="main-content">

     @include('admin.include.breadcrumb', [
    'base_route' => $base_route.'.create',
    'page'=> 'Add'
])
    <div class="page-content">

        @include('admin.include.page-header',[
           'page' => 'Add',
           'title' => $panel,
])

        <div class="row">
            <div class="col-xs-12">
                @include('admin.include.display_flash_data')
                {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post',
                'class' => 'form-horizontal', 'role' => 'form', 'id' => 'form-validation',
                'enctype' => 'multipart/form-data'
                ]) !!}

                @include($view_path.'.includes.form')
                @include('admin.include.status')
                @include('admin.include.submitButton')
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@push('js')
    @include('admin.industries-we-work-for.includes.script')
@endpush
    @include('admin.include.dropify')
@endsection