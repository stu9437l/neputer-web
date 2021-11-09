{!! Form::model($data['row'], ['url' => route($base_route.'.update', $data['row']->id), 'method' => 'put', 'class' => 'form-horizontal', 'role' => 'form']) !!}
{!! Form::hidden('id', $data['row']->id) !!}

<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'col-xs-10 col-sm-5', 'required']); !!}
    </div>
</div>
@include('admin.include.form_validation_message', ['field' => 'title'])


<div class="form-group required">
    {!! Form::label('hint', 'Hint', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('hint', null, ['placeholder' => 'Hint', 'class' => 'col-xs-10 col-sm-5', 'required']); !!}
    </div>
</div>
@include('admin.include.form_validation_message', ['field' => 'hint'])

<hr>

<div class="form-group ">
@include($view_path.'.edit.ads')
</div>

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

<div class="hr hr-24"></div>

{!! Form::close() !!}