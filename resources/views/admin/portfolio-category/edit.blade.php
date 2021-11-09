@extends('admin.include.layout')

@section('title', 'Portfolio Category::Edit')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Edit'
       ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Edit',
                'title' => $panel,
            ])

            <div class="row">
                <div class="col-xs-12">

                    <!-- PAGE CONTENT BEGINS -->

                    @include('admin.include.display_flash_data')

                    {!! Form::model($data['row'], ['url' => route($base_route.'.update', $data['row']->id), 'method' => 'put',
                    'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data', 'id' => 'portfolio-cat-form']) !!}
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

@section('js_scripts')
    @include('admin.include.jquery_ckeditor')
    @include('admin.portfolio-category.includes.scripts')
@endsection
