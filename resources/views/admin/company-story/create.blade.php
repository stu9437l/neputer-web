@extends('admin.include.layout')

@section('title', 'Company Story::Create')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Add'
       ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'Add',
                'title' => $panel,
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    {!! Form::open(['url' => route($base_route.'.store'), 'method' => 'post',
                    'class' => 'form-horizontal', 'role' => 'form', 'id' => 'company-story-form',
                    'enctype' => 'multipart/form-data'
                    ]) !!}

                    @include($view_path.'.includes.form')
                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" name="submit" value="save">
                                <i class="icon-ok bigger-110"></i>
                                Save
                            </button>
                            &nbsp;
                            <button class="btn btn-info" type="submit" name="submit" value="save-continue">
                                <i class="icon-ok bigger-110"></i>
                                Save & Continue
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

@section('js_scripts')
    @include('admin.include.jquery_ckeditor')
    @include('admin.company-story.includes.scripts')
@endsection
