
<div class="form-group">
    {!! Form::label('neputer_logo', 'Neputer Logo', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="neputer"
               data-default-file="@if(isset($data['settings']['neputer_logo'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['neputer_logo']) }}@endif">
    </div>
    @if($errors->has('neputer_logo'))
        <label class="has-error" for="neputer_logo">{{ $errors->first('neputer_logo') }}</label>
    @endif
</div>
<div class="form-group">
    {!! Form::label('neputer_description', 'Neputer Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('neputer_description', $data['settings']['neputer_description'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('neputer_location', 'Neputer Location', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('neputer_location', $data['settings']['neputer_location'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">

    {!! Form::label('footer_1', 'Footer section 1', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('footer_1', $data['settings']['footer_1'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('footer_2', 'Footer section 2', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('footer_2', $data['settings']['footer_2'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('footer_3', 'Footer section 3', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('footer_3', $data['settings']['footer_3'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>

<div class="form-group">

    {!! Form::label('footer_4', 'Footer section 4', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('footer_4', $data['settings']['footer_4'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>
<div class="form-group row">

    {!! Form::label('copyright_message', 'Copy Right Message', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('copyright_message', $data['settings']['copyright_message'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>
