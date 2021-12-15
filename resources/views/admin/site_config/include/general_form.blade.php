
<div class="form-group">
    {!! Form::label('domain_name', 'Company Name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::text('company', $data['settings']['company'] ?? null, ['class' => 'col-xs-10 col-sm-5','placeholder' => 'Company', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'domain_name'
    ])

</div>
<div class="form-group">

    {!! Form::label('company_phone', 'Phone No', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('company_phone', $data['settings']['company_phone']??null, ['placeholder'=>'Company Contact', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'company_phone'
    ])

</div>

<div class="form-group">

    {!! Form::label('company_email', 'Email Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::email('company_email', $data['settings']['company_email']??null, ['placeholder'=>'Enter Valid Email Address', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'company_email'
    ])

</div>
<div class="form-group">

    {!! Form::label('company_address', 'Email Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('company_address', $data['settings']['company_address']??null, ['placeholder'=>'Office Address', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'company_address'
    ])

</div>


<div class="form-group">
    {!! Form::label('logo', 'Logo Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="image"
               data-default-file="@if(isset($data['settings']['logo'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['logo']) }}@endif">
        @if($errors->has('logo'))
            <label class="has-error" for="about_image">{{ $errors->first('logo') }}</label>
        @endif
    </div>
</div>
<hr>
<h1>Below Product Section Banner</h1>
<div class="form-group">
    {!! Form::label('below_product_section_banner', 'Existing Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="below_product_section_image"
               data-default-file="@if(isset($data['settings']['below_product_section_banner'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['below_product_section_banner']) }}@endif">
        @if($errors->has('below_product_section_banner'))
            <label class="has-error" for="about_image">{{ $errors->first('below_product_section_banner') }}</label>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('service_overview_image', 'Service OverView Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="service_overview"
               data-default-file="@if(isset($data['settings']['service_overview_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['service_overview_image']) }}@endif">
        @if($errors->has('service_overview_image'))
            <label class="has-error" for="about_image">{{ $errors->first('service_overview_image') }}</label>
        @endif
    </div>
</div>
<div class="form-group">
    {!! Form::label('service_detail_image', 'Service Detail Page Banner', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="service_detail"
               data-default-file="@if(isset($data['settings']['service_detail_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['service_detail_image']) }}@endif">
        @if($errors->has('service_detail_image'))
            <label class="has-error" for="about_image">{{ $errors->first('service_detail_image') }}</label>
        @endif
    </div>
</div>


<hr>
<h1>Testimonial Banner</h1>

<div class="form-group">
    {!! Form::label('testimonial_section_banner', 'Testimonial Section Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="testimonial_section_image"
               data-default-file="@if(isset($data['settings']['testimonial_section_banner'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['testimonial_section_banner']) }}@endif">
        @if($errors->has('testimonial_section_banner'))
            <label class="has-error" for="about_image">{{ $errors->first('testimonial_section_banner') }}</label>
        @endif
    </div>
</div>


<hr>
<h1>Banner Images</h1>
<div class="form-group">
    {!! Form::label('about_image', 'About Banner Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="about"
               data-default-file="@if(isset($data['settings']['about_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['about_image']) }}@endif">
    @if($errors->has('about_image'))
        <label class="has-error" for="about_image">{{ $errors->first('about_image') }}</label>
    @endif
</div>
</div>

<div class="form-group">
    {!! Form::label('career_image', 'Career Banner Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="career"
               data-default-file="@if(isset($data['settings']['career_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['career_image']) }}@endif">
    </div>
    @if($errors->has('career_image'))
        <label class="has-error" for="career_image">{{ $errors->first('career_image') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('development_process_image', 'Development Process Banner Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="development_process"
               data-default-file="@if(isset($data['settings']['development_process_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['development_process_image']) }}@endif">
    </div>
    @if($errors->has('development_process_image'))
        <label class="has-error" for="development_process_image">{{ $errors->first('development_process_image') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('our_team_image', 'Our Team Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="our_team"
               data-default-file="@if(isset($data['settings']['our_team_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['our_team_image']) }}@endif">
    </div>
    @if($errors->has('our_team_image'))
        <label class="has-error" for="our_team_image">{{ $errors->first('our_team_image') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('service_image', 'Service Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="service"
               data-default-file="@if(isset($data['settings']['service_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['service_image']) }}@endif">

    </div>
    @if($errors->has('service_image'))
        <label class="has-error" for="service_image">{{ $errors->first('service_image') }}</label>
    @endif
</div>

<div class="form-group">
    {!! Form::label('client_review', 'Client Review Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="our_client"
               data-default-file="@if(isset($data['settings']['our_client_banner'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['our_client_banner']) }}@endif">

    </div>
    @if($errors->has('client_review'))
        <label class="has-error" for="our_client_banner">{{ $errors->first('our_client_banner') }}</label>
    @endif
</div>
<div class="form-group">
    {!! Form::label('blog_image', 'Blog Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="blog"
               data-default-file="@if(isset($data['settings']['blog_banner'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['blog_banner']) }}@endif">
    </div>
    @if($errors->has('blog_image'))
        <label class="has-error" for="blog_image">{{ $errors->first('blog_image') }}</label>
    @endif
</div>
<div class="form-group">
    {!! Form::label('contact_banner_image', 'Contact Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="contact"
               data-default-file="@if(isset($data['settings']['contact_banner_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['contact_banner_image']) }}@endif">
    </div>
    @if($errors->has('contact_banner_image'))
        <label class="has-error" for="contact_banner_image">{{ $errors->first('contact_banner_image') }}</label>
    @endif
</div>


<hr>
<h1>Social Links</h1>
<div class="form-group">

    {!! Form::label('facebook', 'Facebook', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="icon-facebook"></i></span>
        {!! Form::url('social[facebook]', $data['settings']['social']['facebook'] ?? null, ['class' => 'form-control','placeholder' => 'Enter Facebook Page Url', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'domain_name'
    ])

</div>

<div class="form-group">

    {!! Form::label('twitter', 'Twitter', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="icon-twitter"></i></span>
        {!! Form::url('social[twitter]', $data['settings']['social']['twitter'] ?? null, ['class' => 'form-control','placeholder' => 'Enter Twitter Page Url', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'domain_name'
    ])

</div>

<div class="form-group">

    {!! Form::label('instagram', 'Instagram', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="icon-instagram"></i></span>
        {!! Form::url('social[instagram]', $data['settings']['social']['instagram'] ?? null, ['class' => 'form-control','placeholder' => 'Enter Instagram Page Url', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'domain_name'
    ])

</div>

<div class="form-group">

    {!! Form::label('youtube', 'Youtube', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9 input-group">
        <span class="input-group-addon"><i class="icon-youtube"></i></span>
        {!! Form::url('social[youtube]', $data['settings']['social']['youtube'] ?? null, ['class' => 'form-control','placeholder' => 'Enter Youtube Page Url', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'domain_name'
    ])

</div>
<h1>Blog Section Side Image</h1>
<div class="form-group">
    {!! Form::label('blog_sidebar_image', 'Existing Images', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="blog_sidebar"
               data-default-file="@if(isset($data['settings']['blog_sidebar_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['blog_sidebar_image']) }}@endif">
        @if($errors->has('blog_sidebar_image'))
            <label class="has-error" for="about_image">{{ $errors->first('blog_sidebar_image') }}</label>
        @endif
    </div>
</div>
