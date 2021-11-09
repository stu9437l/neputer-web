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
    {!! Form::label('description','Description', ['class'=>'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-7">
        {!! Form::textarea('description',null, ['placeholder'=>'Description','class'=>'form-control']) !!}
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        <input type="file" class="dropify form-control col-sm-8" name="file"
               data-default-file="@if(isset($data['row']->images)) {{ \App\Facades\ViewHelperFacade::getImagePath('why-us',$data['row']->images) }}@endif"
               @if(!isset($data['row']->images)) required @endif >
    </div>
    @if($errors->has('image'))
        <label class="has-error" for="image">{{ $errors->first('image') }}</label>
    @endif
</div>

