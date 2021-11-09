@extends('admin.include.layout')

@section('title', 'Role::Edit')

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

                    {!! Form::model($data['row'], ['url'=>route($base_route.'.update', $data['row']->id), 'method'=>'put', 'class' => 'form-horizontal']) !!}
                    {!! Form::hidden('id', $data['row']->id) !!}


                    <div class="form-group required">

                        {!! Form::label('role', 'Role', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

                        <div class="col-sm-9">

                            {!! Form::text('role', null, ['placeholder' => 'Role', 'class' => 'col-xs-10 col-sm-5', 'required']) !!}

                        </div>

                        @include('admin.include.form_validation_message', [
                            'field' => 'role'
                        ])

                    </div>

                    <div class="form-group">

                        {!! Form::label('hint', 'Hint', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

                        <div class="col-sm-9">

                            {!! Form::text('hint', null, ['placeholder' => 'Hint', 'class' => 'col-xs-10 col-sm-5']) !!}

                        </div>

                        @include('admin.include.form_validation_message', [
                            'field' => 'hint'
                        ])

                    </div>

                    <div class="form-group">
                        {!! Form::label('status', 'Status', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

                        <div class="col-sm-9">
                            <div class="control-group">
                                <div class="radio">
                                    <label>
                                        {!! Form::radio('status', 1, true, ['class'=>'ace']) !!}
                                        <span class="lbl"> Active</span>
                                    </label>
                                </div>

                                <div class="radio">
                                    <label>
                                        {!! Form::radio('status', 0, false, ['class'=>'ace']) !!}
                                        <span class="lbl"> Inactive </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

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




