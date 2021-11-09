<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'form-control', 'required']); !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'title'])
</div>


<div class="form-group">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        <input type="file" class="dropify form-control col-sm-8" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('about_us',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >    </div>
    @include('admin.include.form_validation_message', ['field' => 'image'])
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'description'])
</div>

<div class="space-4"></div>


<div class="form-group required">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

    <div class="col-sm-6">
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
    @include('admin.include.form_validation_message', ['field' => 'status'])
</div>


<div class="space-4"></div>



