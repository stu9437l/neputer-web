@extends('admin.include.layout')

@section('title', 'Page::Edit')

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

                    {!! Form::model($data['row'], ['url'=>route($base_route.'.update', $data['row']->id), 'method'=>'put', 'enctype' => 'multipart/form-data', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}

                    @include($view_path.'.include.form')

                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit" name = "submit" value = "save">
                                <i class="icon-ok bigger-110"></i>
                                Update
                            </button>
                            &nbsp;
                            <button class="btn btn-info" type="submit" name = "submit" value = "update-continue">
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

                    {!! Form::close() !!}
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_scripts')
    @include('admin.page.include.scripts')
    <script type="text/javascript">

        $(document).ready(function () {

            $('#page_type').change(function () {

                var $this = $(this);
                if($this.val() == 'link'){
                    $('#page_link').show();
                    $('#page_sel_image').hide();
                }else{
                    $('#page_link').hide();
                }

                if($this.val() == 'content'){
                    $('#page_content').show();
                    $('#page_image').show();
                }else{
                    $('#page_content').hide();
                    $('#page_image').hide();
                }

            })
        })
    </script>

@endsection


