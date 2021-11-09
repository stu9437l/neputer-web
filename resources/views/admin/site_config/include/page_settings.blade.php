<h2>Home Page About Section</h2>
<div class="form-group">

    {!! Form::label('home_page_about_section_short_desc', 'home Page About Short Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">

        {!! Form::textarea('home_page_about_section_short_desc', $data['settings']['home_page_about_section_short_desc']??null, ['placeholder'=>'home Page About Short Description', 'class' => 'col-xs-5 col-sm-5 ckeditor']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'home_page_about_section_short_desc'
    ])

</div>

<hr>
<h2>Contact Page</h2>
<div class="form-group">

    {!! Form::label('contact_detail_content', 'Contact Detail Content', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('contact_detail_content', $data['settings']['contact_detail_content'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Contact Detail Content', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'contact_detail_content'
    ])

</div>

<div class="form-group">

    {!! Form::label('contact_office_address', 'Office Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('contact_office_address', $data['settings']['contact_office_address']??null, ['placeholder'=>'Office Address', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'contact_office_address'
    ])

</div>

<div class="form-group">

    {!! Form::label('contact_email_address', 'Email Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('contact_email_address', $data['settings']['contact_email_address']??null, ['placeholder'=>'Enter Valid Email Address', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'contact_email_address'
    ])

</div>

<div class="form-group">

    {!! Form::label('contact_phone_number', 'Phone Number', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('contact_phone_number', $data['settings']['contact_phone_number']??null, ['placeholder'=>'Phone Number', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'contact_phone_number'
    ])

</div>

<h4>Time Hour</h4>
<div class="form-group">
    {!! Form::label('general_time_hour_for_home_page', 'General Time Hour For Homepage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-4">

        {!! Form::text('general_time_hour_for_home_page[from]', $data['settings']['general_time_hour_for_home_page']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-5 col-sm-5']) !!}
        {!! Form::text('general_time_hour_for_home_page[to]', $data['settings']['general_time_hour_for_home_page']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-5 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
</div>

<div class="form-group">
    {!! Form::label('sunday_time_hour', 'Sunday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('sunday_time_hour[from]', $data['settings']['sunday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('sunday_time_hour[to]', $data['settings']['sunday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
    {!! Form::label('sunday_time_hour', 'If Sunday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::checkbox('sunday_time_hour[closed]', true, $data['settings']['sunday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
</div>
<div class="form-group">
    {!! Form::label('monday_time_hour', 'Monday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('monday_time_hour[from]', $data['settings']['monday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('monday_time_hour[to]', $data['settings']['monday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])

    {!! Form::label('monday_time_hour', 'If Monday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('monday_time_hour[closed]', true, $data['settings']['monday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
</div>
<div class="form-group">
    {!! Form::label('tuesday_time_hour', 'Tuesday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('tuesday_time_hour[from]', $data['settings']['tuesday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('tuesday_time_hour[to]', $data['settings']['tuesday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])

    {!! Form::label('tuesday_time_hour', 'If Tuesday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('tuesday_time_hour[closed]', true, $data['settings']['tuesday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
</div>
<div class="form-group">
    {!! Form::label('wednesday_time_hour', 'Wednesday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('wednesday_time_hour[from]', $data['settings']['wednesday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('wednesday_time_hour[to]', $data['settings']['wednesday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])

    {!! Form::label('wednesday_time_hour', 'If Wednesday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('wednesday_time_hour[closed]', true, $data['settings']['wednesday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('thursday_time_hour', 'Thursday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('thursday_time_hour[from]', $data['settings']['thursday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('thursday_time_hour[to]', $data['settings']['thursday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])

    {!! Form::label('thursday_time_hour', 'If Thursday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('thursday_time_hour[closed]', true, $data['settings']['thursday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('friday_time_hour', 'Friday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('friday_time_hour[from]', $data['settings']['friday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('friday_time_hour[to]', $data['settings']['friday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])

    {!! Form::label('friday_time_hour', 'If Friday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('friday_time_hour[closed]', true, $data['settings']['friday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('saturday_time_hour', 'Saturday Time Hour', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-3">
        {!! Form::text('saturday_time_hour[from]', $data['settings']['saturday_time_hour']['from']??null, ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
        {!! Form::text('saturday_time_hour[to]', $data['settings']['saturday_time_hour']['to']??null, ['placeholder'=>'To', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'general_time_hour'
    ])
    {!! Form::label('saturday_time_hour', 'If Saturday Closed', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-3">
        {!! Form::checkbox('saturday_time_hour[closed]', true, $data['settings']['saturday_time_hour']['closed']??'', ['placeholder'=>'From', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
</div>

<hr>
<h2>Terms & Conditions</h2>
<div class="form-group">

    {!! Form::label('terms_and_conditions_title', 'Terms And Condition Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('terms_and_conditions_title', $data['settings']['terms_and_conditions_title']??null, ['placeholder'=>'Terms And Condition Title', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'terms_and_conditions_title'
    ])

</div>

<div class="form-group">
    {!! Form::label('terms_and_conditions_banner', 'Banner Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-6">
        <input type="file" class="dropify form-control col-sm-8" name="terms_and_conditions_image"
               data-default-file="@if(isset($data['settings']['terms_and_conditions_banner'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['terms_and_conditions_banner']) }}@endif">
        @if($errors->has('terms_and_conditions_banner'))
            <label class="has-error" for="terms_and_conditions_banner">{{ $errors->first('terms_and_conditions_banner') }}</label>
        @endif
    </div>
</div>
<div class="form-group">

    {!! Form::label('terms_and_conditions', 'Terms & Conditions', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('terms_and_conditions', $data['settings']['terms_and_conditions'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Terms & Conditions', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'terms_and_conditions'
    ])

</div>