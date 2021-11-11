<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required']); !!}
        @if($errors->has('title'))
            <label class="has-error" for="title">{{ $errors->first('title') }}</label>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('link', 'Link', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('link', null, ['placeholder' => 'Title', 'class' => 'form-control']); !!}
        @if($errors->has('link'))
            <label class="has-error" for="link">{{ $errors->first('link') }}</label>
        @endif
    </div>
</div>



<div class="form-group">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        <input type="file" class="dropify form-control col-sm-8" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('clients',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >
        @if($errors->has('image'))
            <label class="has-error" for="image">{{ $errors->first('image') }}</label>
        @endif
    </div>

</div>


<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
        @if($errors->has('description'))
            <label class="has-error" for="description">{{ $errors->first('description') }}</label>
        @endif
    </div>

</div>


<div class="space-4"></div>


<div class="form-group required">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

    <div class="col-sm-7">
        <div class="control-group">
            <div class="radio">
                <label>
                    {!! Form::radio('status', 1, true, ['class' => 'ace']) !!}
                    <span class="lbl"> Active</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    {!! Form::radio('status', 0, false, ['class' => 'ace']) !!}
                    <span class="lbl"> Inactive</span>
                </label>
            </div>
        </div>
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>




