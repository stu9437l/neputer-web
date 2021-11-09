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
    <div class="col-sm-8">
        {!! Form::textarea('description', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>

<div class="form-group required">
    {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        <input type="file" class="dropify form-control col-sm-8" name="file"
               data-default-file="@if(isset($data['row']->image)) {{ \App\Facades\ViewHelperFacade::getImagePath('services',$data['row']->image) }}@endif"
               @if(!isset($data['row']->image)) required @endif >
    </div>
    @if($errors->has('image'))
        <label class="has-error" for="image">{{ $errors->first('image') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('expertise_title', 'Expertise Title', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::text('expertise_title', null, ['placeholder' => 'Expertise Title', 'class' => 'form-control']); !!}
    </div>
    @if($errors->has('expertise_title'))
        <label class="has-error" for="expertise_title">{{ $errors->first('expertise_title') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('expertise_detail', 'Expertise Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::textarea('expertise_detail', null, ['placeholder' => 'Enter Expertise Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('expertise_detail'))
        <label class="has-error" for="expertise_detail">{{ $errors->first('expertise_detail') }}</label>
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
    {!! Form::label('seo_desc', 'Seo Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('seo_desc', null, ['placeholder' => 'Enter Seo_Description', 'class' => 'form-control']); !!}
    </div>
    @if($errors->has('seo_desc'))
        <label class="has-error" for="seo_desc">{{ $errors->first('seo_desc') }}</label>
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


<div class="form-group">
    {!! Form::label('service_description', 'Service Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::textarea('service_description', null, ['placeholder' => 'Enter Service Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('service_description'))
        <label class="has-error" for="service_description">{{ $errors->first('description') }}</label>
    @endif
</div>


<div class="form-group">
    {!! Form::label('highlight_description', 'Highlight Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::textarea('highlight_description', null, ['placeholder' => 'Enter Highlight Description', 'class' => 'form-control ckeditor']); !!}
    </div>
    @if($errors->has('highlight_description'))
        <label class="has-error" for="highlight_description">{{ $errors->first('highlight_description') }}</label>
    @endif
</div>



