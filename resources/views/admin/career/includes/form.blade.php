<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('title'))
        <label class="has-error" for="title">{{ $errors->first('title') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('jobType', 'Job Type', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('jobType', null, ['placeholder' => 'Job Type', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('jobType'))
        <label class="has-error" for="jobType">{{ $errors->first('jobType') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('company', 'Company', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('company', null, ['placeholder' => 'Company', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('company'))
        <label class="has-error" for="company">{{ $errors->first('company') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('jobLevel', 'Job Level', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('jobLevel', null, ['placeholder' => 'Job Level', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('jobLevel'))
        <label class="has-error" for="jobLevel">{{ $errors->first('jobLevel') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('location', 'Location', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('location', null, ['placeholder' => 'Location', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('location'))
        <label class="has-error" for="location">{{ $errors->first('location') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('salary', 'Salary', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('salary', null, ['placeholder' => 'Salary', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('salary'))
        <label class="has-error" for="salary">{{ $errors->first('salary') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('deadline_to_apply', 'Deadline To Apply', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::date('deadline_to_apply', null, ['placeholder' => 'Deadline To Apply', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('deadline_to_apply'))
        <label class="has-error" for="deadline_to_apply">{{ $errors->first('deadline_to_apply') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('overview', 'Overview', ['class'=> 'col-sm-3 control-label no-padding-right ']) !!}
    <div class="col-sm-7">
        {!! Form::textarea('overview', null , ['placeholder' => 'Overview' , 'class'=>'form-control ckeditor' , 'required']) !!}
    </div>
    @if($errors->has('overview'))
        <label for="overview" class="has-error">{{ $errors->first('overview') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('requirement_experience', 'Required experience', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::textarea('requirement_experience', null, ['placeholder' => 'Enter Required experience', 'class' => 'form-control ckeditor','required']); !!}
    </div>
    @if($errors->has('requirement_experience'))
        <label class="has-error" for="requirement_experience">{{ $errors->first('requirement_experience') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('skills', 'Skills', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::textarea('skills', null, ['placeholder' => 'Enter Skills', 'class' => 'form-control ckeditor','required']); !!}
    </div>
    @if($errors->has('skills'))
        <label class="has-error" for="skills">{{ $errors->first('skills') }}</label>
    @endif
</div>






