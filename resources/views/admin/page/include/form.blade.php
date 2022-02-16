<div class="form-group required">

    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('title', null, ['placeholder'=>'Title', 'class' => 'col-xs-10 col-sm-5',]) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'title'
    ])

</div>

<div class="form-group">

    {!! Form::label('open_in', 'Open In', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::select('open_in', ['same'=>'Same', 'new'=>'New'], ['class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'open_in'
    ])

</div>

<div class="form-group">
{!! Form::label('page_type', 'Page Type', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        <select name="parent_id" class= "form-control" id="menuList"></select>
    </div>
</div>
<div class="form-group">

    {!! Form::label('page_type', 'Page Type', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::select('page_type', ['link'=>'Link', 'content'=>'Content'], null, ['class' => 'form-inline', 'id'=>'page_type']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'page_type'
    ])

</div>

<div class="form-group required" id="page_link"
     @if(!isset($data['row']) || $data['row']->page_type=='content')style="display: none"
        @endif>

    {!! Form::label('link', 'Link', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9 input-group">
        <span class="input-group-addon">{{ config('app.url') }}</span>
        {!! Form::text('link', null, ['placeholder'=>'','class' => 'col-xs-10 col-sm-5 link-input']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'link'
    ])

</div>

<div class="content">
    <div class="form-group required page_content"
         @if(!isset($data['row']) || $data['row']->page_type=='link')style="display: none"
            @endif>

        {!! Form::label('content', 'Content', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-6">

            {!! Form::textarea('content', null, ['placeholder'=>'content', 'class' => 'col-xs-8 col-sm-5 ckeditor']) !!}

        </div>

        @include('admin.include.form_validation_message', [
            'field' => 'content'
        ])

    </div>

    <div class="form-group page_content"
         @if(!isset($data['row']) || $data['row']->page_type=='link')style="display: none"
            @endif>

        {!! Form::label('image', 'Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-9">

            {!! Form::file('image') !!}

        </div>
    </div>
    <div class="form-group page_content"
         @if(!isset($data['row']) || $data['row']->page_type=='link')style="display: none"
            @endif>

        {!! Form::label('image', 'Selected Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        @if(isset($data['row']))
            <div class="col-sm-9">
                <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image)}}" width="150">
            </div>
        @endif
    </div>
</div>

<div class="form-group">
    {!! Form::label('status', 'Status', ['class'=>'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        <div class="control-group">
            <div class="radio">
                <label>
                    {!! Form::radio('status', 1, true, ['class'=>'ace']) !!}
                    <span class="lbl"> Active</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    {!! Form::radio('status', 0, false, ['class'=>'ace']) !!}
                    <span class="lbl"> Inactive</span>
                </label>
            </div>
        </div>
    </div>
</div>

<div class="form-group">

    {!! Form::label('hint', 'Hint', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::textarea('hint', null, ['placeholder'=>'Hint', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'hint'
    ])

</div>


<div class="form-group">

    {!! Form::label('seo_title', 'SEO Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('seo_title', null, ['placeholder'=>'SEO Title', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'seo_title'
    ])

</div>

<div class="form-group">

    {!! Form::label('seo_desc', 'SEO Descriptions', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('seo_desc', null, ['placeholder'=>'SEO Description', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'seo_desc'
    ])

</div>

<div class="form-group">

    {!! Form::label('seo_keys', 'SEO Keywords', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('seo_keys', null, ['placeholder'=>'SEO Keywords', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'seo_keys'
    ])

</div>