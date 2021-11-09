<div class="form-group">

    {!! Form::label('product_load_more_limit', 'Product Load More Limit', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('product_load_more_limit', $data['settings']['product_load_more_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Product Load More Limit', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'product_load_more_limit'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('slider_limit', 'Slider Limit', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('slider_limit', $data['settings']['slider_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Slider Limit', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'slider_limit'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('service_limit', 'Service Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('service_limit', $data['settings']['service_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Service Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'service_limit'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('our_work', 'Our Work Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('our_work', $data['settings']['our_work'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Our Work Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'our_work'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('industries_limit', 'Industries Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('industries_limit', $data['settings']['industries_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Industries Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'industries_limit'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('testimonial_limit', 'Testimonial Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('testimonial_limit', $data['settings']['testimonial_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Testimonial Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'testimonial_limit'
    ])

</div>

<hr>
<div class="form-group">

    {!! Form::label('client_limit', 'Client Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('client_limit', $data['settings']['client_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Client Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'client_limit'
    ])

</div>
<div class="form-group">

    {!! Form::label('client_limit_careerPage', 'Client Limit CareerPage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('client_limit_careerPage', $data['settings']['client_limit_careerPage'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Client Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'client_limit_careerPage'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('development_process_limit', 'Development Process HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('development_process_limit', $data['settings']['development_process_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Development Process HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'development_process_limit'
    ])

</div>
<hr>
<div class="form-group">

    {!! Form::label('career_limit', 'Career Limit HomePage', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('career_limit', $data['settings']['career_limit'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Career Limit HomePage', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'career_limit'
    ])

</div>

<hr>
<h3>Counter Section</h3>
<div class="form-group">
    {!! Form::label('counter_1', 'Counter 1', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_1', $data['settings']['counter_1'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_1', 'Counter Title 1', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_1', $data['settings']['counter_title_1'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_1', 'Icon Images 1', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_1"
               data-default-file="@if(isset($data['settings']['icon1'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon1']) }}@endif">
    </div>
    @if($errors->has('icon_1'))
        <label class="has-error" for="icon_1">{{ $errors->first('icon_1') }}</label>
    @endif
</div>
<hr>
<div class="form-group">
    {!! Form::label('counter_2', 'Counter 2', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_2', $data['settings']['counter_2'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_2', 'Counter Title 2', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_2', $data['settings']['counter_title_2'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_2', 'Icon Images 2', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_2"
               data-default-file="@if(isset($data['settings']['icon2'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon2']) }}@endif">
    </div>
    @if($errors->has('icon_2'))
        <label class="has-error" for="icon_2">{{ $errors->first('icon_2') }}</label>
    @endif
</div>
<hr>
<div class="form-group">
    {!! Form::label('counter_3', 'Counter 3', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_3', $data['settings']['counter_3'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_3', 'Counter Title 3', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_3', $data['settings']['counter_title_3'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_3', 'Icon Images 3', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_3"
               data-default-file="@if(isset($data['settings']['icon3'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon3']) }}@endif">
    </div>
    @if($errors->has('icon_3'))
        <label class="has-error" for="icon_3">{{ $errors->first('icon_3') }}</label>
    @endif
</div>

<hr>
<div class="form-group">
    {!! Form::label('counter_4', 'Counter 4', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_4', $data['settings']['counter_4'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_4', 'Counter Title 4', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_4', $data['settings']['counter_title_4'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_4', 'Icon Images 4', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_4"
               data-default-file="@if(isset($data['settings']['icon4'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon4']) }}@endif">
    </div>
    @if($errors->has('icon_4'))
        <label class="has-error" for="icon_4">{{ $errors->first('icon_4') }}</label>
    @endif
</div>

<hr>
<div class="form-group">
    {!! Form::label('counter_5', 'Counter _5', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_5', $data['settings']['counter_5'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_5', 'Counter Title _5', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_5', $data['settings']['counter_title_5'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_5', 'Icon Images _5', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_5"
               data-default-file="@if(isset($data['settings']['icon5'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon5']) }}@endif">
    </div>
    @if($errors->has('icon_5'))
        <label class="has-error" for="icon_5">{{ $errors->first('icon_5') }}</label>
    @endif
</div>


<hr>
<div class="form-group">
    {!! Form::label('counter_6', 'Counter _6', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_6', $data['settings']['counter_6'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('counter_title_6', 'Counter Title _6', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-6">
        {!! Form::text('counter_title_6', $data['settings']['counter_title_6'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('icon_6', 'Icon Images _6', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="icon_6"
               data-default-file="@if(isset($data['settings']['icon6'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['icon6']) }}@endif">
    </div>
    @if($errors->has('icon_6'))
        <label class="has-error" for="icon_6">{{ $errors->first('icon_6') }}</label>
    @endif
</div>
