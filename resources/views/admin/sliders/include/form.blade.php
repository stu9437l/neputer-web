<div class="form-group required">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
{{--        {!! Form::file('image', ['class' => 'col-xs-10 col-sm-5']) !!}--}}
        <input type="file" name="image" class="col-xs-10 col-sm-5" @if(!isset($data['row'])) required @endif/>
    </div>
    @include('admin.include.form_validation_message', ['field' => 'image'])
</div>


@if (isset($data['row']))
    <div class="space-4"></div>
    <div class="form-group">
        {!! Form::label('image', 'Page Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
        <div class="col-sm-9">
            @if ($data['row']->image)
                <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}" width="500">
            @else
                <img src="{{ ViewHelper::getImagePath($folder, 'no_image.gif') }}" width="200">
            @endif
        </div>
    </div>
@endif

<div class="form-group">
    {!! Form::label('caption', 'Caption', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('caption', null, ['placeholder' => 'Enter Caption', 'class' => 'col-xs-10 col-sm-5', ]) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'caption'])
</div>

<div class="form-group">
    {!! Form::label('caption_two', 'Caption Two', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('caption_two', null, ['placeholder' => 'Enter Caption', 'class' => 'col-xs-10 col-sm-5', ]) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'caption_two'])
</div>

<div class="form-group">
    {!! Form::label('alt_text', 'Alt Text', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::textarea('alt_text', null, ['placeholder' => 'Enter some text', 'class' => 'col-xs-10 col-sm-5 ckeditor', ]) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'alt_text'])
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
    @include('admin.include.form_validation_message', ['field' => 'status'])
</div>