<!-- About -->
<h2>About</h2>
<div class="form-group">
    {!! Form::label('Index (about section title)', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('about_title', $data['settings']['about_title'] ?? null , ['class' => 'col-xs-7 col-sm-5 ','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Index (about section sub-title)','Sub-title', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('about_subtitle', $data['settings']['about_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5']) !!}
    </div>
</div>
<div class="form-group">

    {!! Form::label('about_quote', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('about_quote', $data['settings']['about_quote'] ?? null, ['class' => 'col-xs-7 col-sm-5','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>

<!-- Client -->
<hr>
<h2 >Client</h2>
<div class="form-group">
    {!! Form::label('Index (client section title)', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('client_title', $data['settings']['client_title'] ?? null , ['class' => 'col-xs-7 col-sm-5 ', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Index (client section sub-title)','Sub-title', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('client_subtitle', $data['settings']['client_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Client Description','client_description', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('client_description', $data['settings']['client_description'] ?? null , ['class' => 'col-xs-7 col-sm-5 ckeditor', 'autocomplete' => 'off']) !!}
    </div>
</div>

<!-- Services -->
<hr>
<h2>Services</h2>
<div class="form-group">
    {!! Form::label('service_banner_title', 'Service Banner Title' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_banner_title', $data['settings']['service_banner_title'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('service_banner_subtitle', 'Service Banner Subtitle' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_banner_subtitle', $data['settings']['service_banner_subtitle'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<!-- Service Page title -->

<div class="form-group">
    {!! Form::label('service_title', 'Service Page Title' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_title', $data['settings']['service_title'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('service_subtitle', 'Service Page Subtitle' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_subtitle', $data['settings']['service_subtitle'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('service_page_description', 'Service Page Description' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('service_page_description', $data['settings']['service_page_description'] ?? null , ['class'=> 'col-xs-7 col-sm-5 ckeditor','autocomplete' => 'off']) !!}
    </div>
</div>
<!-- Home page Service title and subtitle -->
<div class="form-group">
    {!! Form::label('service_homepage_title', 'Service Homepage Title' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_homepage_title', $data['settings']['service_homepage_title'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('service_homepage_subtitle', 'Service Homepage Subtitle' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('service_homepage_subtitle', $data['settings']['service_homepage_subtitle'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<!-- Overview Service title -->

<div class="form-group">
    {!! Form::label('overview_title', 'Overview Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('overview_title', $data['settings']['overview_title'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('overview_subtitle', 'Overview Subtitle' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('overview_subtitle', $data['settings']['overview_subtitle'] ?? null , ['class'=> 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('overview_description', 'Overview Description' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('overview_description', $data['settings']['overview_description'] ?? null , ['class'=> 'col-xs-7 col-sm-5 ckeditor','autocomplete' => 'off']) !!}
    </div>
</div>



<!-- Our Work -->
<hr>
<h2>Our Work </h2>
<div class="form-group">
    {!! Form::label('work_title', 'Work title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('work_title', $data['settings']['work_title'] ?? null , ['class' => 'col-xs-7 col-sm-5', 'autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('work_subtitle', 'Work Subtitle', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('work_subtitle', $data['settings']['work_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<!-- Client Testimonial-->
<hr>
<h2>Client Testimonial</h2>
<div class="form-group">
    {!! Form::label('client_testimonial', 'Client Testimonial Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('client_testimonial_title' , $data['settings']['client_testimonial_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('client_testimonial_subtitle' , 'Client Testimonial Subtitle' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('client_testimonial_subtitle' , $data['settings']['client_testimonial_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<!-- Contact Title and Subtitle-->
<hr>
<h2>Contact</h2>
<div class="form-group">
    {!! Form::label('contact', 'Contact Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('contact_title' , $data['settings']['contact_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_subtitle' , 'Contact Subtitle' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('contact_subtitle' , $data['settings']['contact_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('contact_number' , 'Contact Number' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::tel('contact_number' , $data['settings']['contact_number'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_number_message' , 'Contact Number Message' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('contact_number_message' , $data['settings']['contact_number_message'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_email_message' , 'Contact Email Message' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('contact_email_message' , $data['settings']['contact_email_message'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_email' , 'Contact Email' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::email('contact_email' , $data['settings']['contact_email'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_skype_message' , 'Contact Skype Message'  , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('contact_skype_message' , $data['settings']['contact_skype_message'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('contact_skype' , 'Contact Skype' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::tel('contact_skype' , $data['settings']['contact_skype'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<!-- Industries We Worked For-->
<hr>
<h2>Industries we work for</h2>
<div class="form-group">
    {!! Form::label('industries_we_work_for', 'Industries We Work For Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('industries_we_work_for_title' , $data['settings']['industries_we_work_for_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('industries_we_work_for_subtitle' , 'Industries We Work For Subtitle' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('industries_we_work_for_subtitle' , $data['settings']['industries_we_work_for_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">

    {!! Form::label('industries_we_work_for_description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('industries_we_work_for_description', $data['settings']['industries_we_work_for_description'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'industries_we_work_for_description'
    ])

</div>

<!-- Our Location -->
<hr>
<h2>Our Location </h2>
<div class="form-group">
    {!! Form::label('our_location', 'Our Location Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('our_location_title' , $data['settings']['our_location_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('our_location_subtitle' , 'Our Location Subtitle' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('our_location_subtitle' , $data['settings']['our_location_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<!-- Our Location -->
<hr>
<h2>Hire </h2>
<div class="form-group">
    {!! Form::label('hire_title', 'Hire Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('hire_title' , $data['settings']['hire_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('hire_button_name' , 'Hire Button' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('hire_button_name' , $data['settings']['hire_button_name'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('hire_link' , 'Hire link' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('hire_link' , $data['settings']['hire_link'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<!-- Career -->

<hr>
<h2>Career Title </h2>
<div class="form-group">
    {!! Form::label('career_title', 'Career Title' , ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('career_title' , $data['settings']['career_title'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<div class="form-group">

    {!! Form::label('career_description', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('career_description', $data['settings']['career_description'] ?? null, ['class' => 'col-xs-7 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>
<div class="form-group">
    {!! Form::label('career_button_name' , 'Career Button' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('career_button_name' , $data['settings']['career_button_name'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('enquiry_heading' , 'Enquiry Heading' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('enquiry_heading' , $data['settings']['enquiry_heading'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('enquiry_subheading' , 'Enquiry Subheading' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('enquiry_subheading' , $data['settings']['enquiry_subheading'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('enquiry_date' , 'Enquiry Date' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::date('enquiry_date' , $data['settings']['enquiry_date'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('enquiry_after_date_heading' , 'Enquiry AfterDate Heading' , ['class'=> 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('enquiry_after_date_heading' , $data['settings']['enquiry_after_date_heading'] ?? null , ['class' => 'col-xs-7 col-sm-5','autocomplete' => 'off' ]) !!}
    </div>
</div>

<hr>
<h3>Request a Quotes</h3>
<div class="form-group">
    {!! Form::label('Request a Quotes Title','Title', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('quotes_title', $data['settings']['quotes_title'] ?? null , ['class' => 'col-xs-7 col-sm-5']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Request a Quotes Subtitle','Sub-title', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('quotes_subtitle', $data['settings']['quotes_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('quote_banner_image', 'Quote Banner Image', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-5">
        <input type="file" class="dropify form-control col-sm-5" name="quote_image"
               data-default-file="@if(isset($data['settings']['quote_banner_image'])) {{ \App\Facades\ViewHelperFacade::getImagePath('site_configuration',$data['settings']['quote_banner_image']) }}@endif">
        @if($errors->has('quote_banner_image'))
            <label class="has-error" for="about_image">{{ $errors->first('quote_banner_image') }}</label>
        @endif
    </div>
</div>
<hr>
<h3>Subscription</h3>
<div class="form-group">
    {!! Form::label('Subscription Title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('subscription_title', $data['settings']['subscription_title'] ?? null , ['class' => 'col-xs-7 col-sm-5 ','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Subscription Button Name', 'Button name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::text('subscription_button_name', $data['settings']['subscription_button_name'] ?? null , ['class' => 'col-xs-7 col-sm-5 ','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('Subscription Subtitle','Sub-title', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-6">
        {!! Form::textarea('subscription_subtitle', $data['settings']['subscription_subtitle'] ?? null , ['class' => 'col-xs-7 col-sm-5 ckeditor']) !!}
    </div>
</div>