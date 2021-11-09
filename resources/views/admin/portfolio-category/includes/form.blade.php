<div class="form-group required">
    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'col-xs-10 col-sm-5',]); !!}
        @if($errors->has('title'))
            <label class="has-error" for="title">{{ $errors->first('title') }}</label>
        @endif
    </div>
</div>


<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'col-xs-10 col-sm-5 ckeditor']); !!}
        @if($errors->has('description'))
            <label class="has-error" for="description">{{ $errors->first('description') }}</label>
        @endif
    </div>
</div>

@if (isset($data['row']))
    <div class="space-4"></div>
    <div class="form-group">
        {!! Form::label('image', 'Selected Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
        <div class="col-sm-9">
            @if ($data['row']->image)
                <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}" width="200">
            @else
                <p>No Image</p>
            @endif
        </div>
    </div>
@endif


<div class="space-4"></div>


<div class="form-group">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::file('image', ['class' => 'col-xs-10 col-sm-5']); !!}
        @if($errors->has('image'))
            <label class="has-error" for="image">{{ $errors->first('image') }}</label>
        @endif
    </div>
</div>


<div class="space-4"></div>


<div class="form-group required">
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
        @if($errors->has('status'))
            <label class="has-error" for="status">{{ $errors->first('status') }}</label>
        @endif
    </div>
</div>


<div class="space-4"></div>
<div class="form-group">
    {!! Form::label('seo_title', 'Seo Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('seo_title', null, ['placeholder' => 'Enter Seo_title', 'class' => 'col-xs-10 col-sm-5']); !!}
        @if($errors->has('seo_title'))
            <label class="has-error" for="seo_title">{{ $errors->first('seo_title') }}</label>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('seo_description', 'Seo Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('seo_description', null, ['placeholder' => 'Enter Seo_Description', 'class' => 'col-xs-10 col-sm-5']); !!}
        @if($errors->has('seo_description'))
            <label class="has-error" for="seo_description">{{ $errors->first('seo_description') }}</label>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('seo_keywords', 'Seo Keyword', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-9">
        {!! Form::text('seo_keywords', null, ['placeholder' => 'Enter Seo_Keyword', 'class' => 'col-xs-10 col-sm-5']); !!}
        @if($errors->has('seo_keywords'))
            <label class="has-error" for="seo_keywords">{{ $errors->first('seo_keywords') }}</label>
        @endif
    </div>
</div>



