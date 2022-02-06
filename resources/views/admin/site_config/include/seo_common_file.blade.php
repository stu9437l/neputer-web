<h4>{{ $seo_title }}</h4>
<div class="form-group">

    {!! Form::label($seo_key.'_seo_title', $seo_title.' SEO Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text($seo_key.'_seo_title', $data['settings'][$seo_key.'_seo_title'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => $seo_title.' SEO Title', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => $seo_key.'_seo_title'
    ])

</div>


<div class="form-group">

    {!! Form::label($seo_key.'_seo_keywords', $seo_title.' SEO Keywords', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::textarea($seo_key.'_seo_keywords', $data['settings'][$seo_key.'_seo_keywords'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => $seo_title.' SEO Keywords', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => $seo_key.'_seo_keywords'
    ])

</div>

<div class="form-group">

    {!! Form::label($seo_key.'_seo_description', $seo_title.' SEO Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::textarea($seo_key.'_seo_description', $data['settings'][$seo_key.'_seo_description'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => $seo_title.' SEO Description', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => $seo_key.'_seo_description'
    ])

</div>
<hr>