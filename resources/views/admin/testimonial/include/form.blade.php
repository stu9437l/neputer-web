<div class="form-group required">
    {!! Form::label('testimonial_by', 'Name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('testimonial_by', null, ['placeholder' => 'Testimonial By', 'class' => 'form-control', 'required']) !!}
    </div>
    @if($errors->has('testimonial_by'))
        <label class="has-error" for="testimonial_by">{{ $errors->first('testimonial_by') }}</label>
    @endif
</div>


<div class="form-group">
    {!! Form::label('designation', 'Designation', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('designation', null, ['placeholder' => 'Enter Designation', 'class' => 'form-control', ]) !!}
    </div>
    @if($errors->has('designation'))
        <label class="has-error" for="designation">{{ $errors->first('designation') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('address', 'Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('address', null, ['placeholder' => 'Enter Address', 'class' => 'form-control', ]) !!}
    </div>
    @if($errors->has('address'))
        <label class="has-error" for="address">{{ $errors->first('address') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('testimonial', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        {!! Form::textarea('testimonial', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('testimonial'))
        <label class="has-error" for="testimonial">{{ $errors->first('testimonial') }}</label>
    @endif
</div>

<div class="form-group @if(!isset($data['row'])) required @endif">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        <input type="file" class="dropify form-control col-sm-6" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('testimonial',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >    </div>
    @if($errors->has('image'))
        <label class="has-error" for="image">{{ $errors->first('image') }}</label>
    @endif
</div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

    <div class="col-sm-9">
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
    @if($errors->has('status'))
        <label class="has-error" for="status">{{ $errors->first('status') }}</label>
    @endif
</div>