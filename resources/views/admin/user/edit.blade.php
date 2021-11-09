@extends('admin.include.layout')

@section('title', 'User::Edit')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'Edit'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
            'page' => 'Edit',
            'title' => 'Edit'
        ])


            @if($errors->any())
                @include('admin.include.form_alert_message')
            @endif

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {!! Form::model($data['row'], ['url'=>route($base_route.'.update', $data['row']->id), 'method'=>'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal', 'id' => 'user-form']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}

                    @include($view_path.'.include.form')

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Update
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

