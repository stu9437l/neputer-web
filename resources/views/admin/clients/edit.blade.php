@extends('admin.include.layout')

@section('title', 'Client::Edit')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Edit'
       ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Edit',
                'title' => '',
                'id' => $data['row']->id
            ])

            <div class="row">
                <div class="col-xs-12">

                    <!-- PAGE CONTENT BEGINS -->

                    {{--                    @if ($errors->any())--}}
                    {{--                        @include('admin.include.form_validation_message')--}}
                    {{--                    @endif--}}

                    {!! Form::model($data['row'], ['url' => route($base_route.'.update', $data['row']->id), 'method' => 'put',
                    'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'id' => 'clients-form']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}

                    @include($view_path.'.includes.form')

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" name="submit" value="save">
                                <i class="icon-ok bigger-110"></i>
                                Update
                            </button>
                            &nbsp;
                            <button class="btn btn-info" type="submit" name="submit" value="update-continue">
                                <i class="icon-ok bigger-110"></i>
                                Update & Continue
                            </button>

                            &nbsp; &nbsp; &nbsp;
                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>

                    <div class="hr hr-24"></div>

                    {!! Form::close() !!}


                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection
@include('admin.include.dropify')
@section('js_scripts')
    @include('admin.include.jquery_ckeditor')
    @include('admin.clients.includes.scripts')
@endsection
