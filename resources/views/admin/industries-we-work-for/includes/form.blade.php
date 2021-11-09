<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control','required']); !!}
    </div>
    @if($errors->has('title'))
        <label class="has-error" for="title">{{ $errors->first('title') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('link', 'Link' , ['class'=> 'col-sm-3 control-label no-padding-right']); !!}

    <div class="col-sm-5">
        {!! Form::text('link',null , ['placeholder' => 'Link ' , 'class'=> 'form-control' ,'required']); !!}
    </div>

    @if($errors->has('link'))
        <label for="link" class="has-error">{{ $error->first('link') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('file', 'Image' , ['class'=> 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('industries-we-work-for',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >
     </div>

    @if($errors->has('file'))
        <label for="file" class="has-error">{{ $error->first('file') }}</label>
    @endif
</div>