<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('title'))
        <label class="has-error" for="title">{{ $errors->first('title') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>


<div class="form-group required">
    {!! Form::label('file', 'Image' , ['class'=> 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        <input type="file" class="dropify form-control col-sm-5" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('development-process',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >
    </div>

    @if($errors->has('file'))
        <label for="file" class="has-error">{{ $error->first('file') }}</label>
    @endif
</div>


