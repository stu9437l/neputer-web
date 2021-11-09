@extends('admin.include.layout')

@section('title', 'Menu Section::Edit')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'Edit'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
            'page' => 'null',
            'title' => 'Edit'
        ])


            @if($errors->any())
                @include('admin.include.form_alert_message')
            @endif

            @include('admin.include.display_flash_data')

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    {!! Form::model($data['row'], ['url'=>route($base_route.'.update', $data['row']->id), 'method'=>'put', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}

                    @include($view_path.'.edit.form')
                    <hr>
                    @include($view_path.'.edit.pages')
                    <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-info" type="submit" name="submit" value="update">
                                    <i class="icon-ok bigger-110"></i>
                                    Update
                                </button>

                                <button class="btn btn-info" type="submit" name="submit" value="update-continue">
                                    <i class="icon-ok bigger-110"></i>
                                    Update & Continue
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

    @yield('page_scripts')
    @include('admin.include.jquery_sortable')
    @endsection


