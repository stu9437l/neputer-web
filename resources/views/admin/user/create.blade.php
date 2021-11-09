@extends('admin.include.layout')

@section('title', 'User::Create')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'Add'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'title' => 'Users',
                'page' => 'Add'
            ])

            @if($errors->any())
                @include('admin.include.form_alert_message')
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {!! Form::open(['url'=>route($base_route.'.store'), 'method'=>'post', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'user-form']) !!}

                    @include($view_path.'.include.form')

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Submit
                            </button>

                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_scripts')
    @include('admin.user.include.scripts')
@endsection




