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
    {!! Form::label('portfolio_category_id', 'Portfolio Category', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::select('portfolio_category_id', $data['porfolioCategories'], null, ['placeholder' => 'Select Portfolio Category', 'class' => 'form-control', 'required']); !!}
    </div>
    @if($errors->has('portfolio_category_id'))
        <label class="has-error" for="portfolio_category_id">{{ $errors->first('portfolio_category_id') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>

@if (isset($data['row']))
    <div class="space-4"></div>
    <div class="form-group">
        {!! Form::label('image', 'Selected Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
        <div class="col-sm-7">
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
    <div class="col-sm-7">
        {!! Form::file('image'); !!}
    </div>
    @if($errors->has('image'))
        <label class="has-error" for="image">{{ $errors->first('image') }}</label>
    @endif
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


<div class="space-4"></div>
<div class="form-group">
    {!! Form::label('seo_title', 'Seo Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('seo_title', null, ['placeholder' => 'Enter Seo_title', 'class' => 'form-control']); !!}
    </div>
    @if($errors->has('seo_title'))
        <label class="has-error" for="seo_title">{{ $errors->first('seo_title') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('seo_description', 'Seo Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('seo_description', null, ['placeholder' => 'Enter Seo_Description', 'class' => 'form-control']); !!}
    </div>
    @if($errors->has('seo_description'))
        <label class="has-error" for="seo_description">{{ $errors->first('seo_description') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('seo_keywords', 'Seo Keyword', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('seo_keywords', null, ['placeholder' => 'Enter Seo_Keyword', 'class' => 'form-control']); !!}
    </div>
    @if($errors->has('seo_keywords'))
        <label class="has-error" for="seo_keywords">{{ $errors->first('seo_keywords') }}</label>
    @endif
</div>



