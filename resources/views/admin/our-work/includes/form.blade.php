<div class="form-group required">
    {!! Form::label('name', 'Name', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('name', null, ['placeholder' => 'Name', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('name'))
        <label class="has-error" for="name">{{ $errors->first('name') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::textarea('description', null, ['placeholder' => 'Description', 'class' => 'form-control ckeditor', 'required']); !!}
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        <input type="file" class="dropify form-control col-sm-5" name="file"
               data-default-file="@if(isset($data['row']->images)) {{ \App\Facades\ViewHelperFacade::getImagePath('our-work',$data['row']->images) }}@endif"
               @if(!isset($data['row']->images)) required @endif >
    </div>
    @if($errors->has('image'))
        <label class="has-error" for="image">{{ $errors->first('image') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('platform', 'Platform', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('platform', null, ['placeholder' => 'Platform', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('platform'))
        <label class="has-error" for="platform">{{ $errors->first('platform') }}</label>
    @endif
</div>


