<section class="contact-page pad-tb section-nx">
    <div class="container">
        @include('admin.include.display_flash_data')
        <div class="row justify-content-center">
            <div class="col-lg-6 v-center">
                <div class="common-heading text-l">
                    <span>{{ $_settings['contact_title'] ?? 'Contact Title' }}</span>
                    <h2 class="mt0 mb0">{{ $_settings['contact_subtitle'] ?? 'Contact Title' }}</h2>
                </div>
                <div class="form-block">
                    <form action="{{ route('contact.store') }}" method="post" name="feedback-form" id="feedback-form">
                        @csrf
                        <div class="fieldsets row">
                            <div class="col-md-6">
                                {{ Form::text('name', null ,['placeholder'=> 'Enter your name *']) }}
                                @if($errors->has('name'))
                                    <label class="has-error" for="name">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            @include('admin.include.form_validation_message', [
                                'field' => 'name'
                            ])
                            <div class="col-md-6">
                                {{ Form::email('email', null ,['placeholder'=> 'Enter your email *',
                                 "pattern" => "([a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$)",
                                'required']) }}
                                @if($errors->has('email'))
                                    <label class="has-error" for="email">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="fieldsets row">
                            <div class="col-md-6 fieldsets-custom">
                                {{ Form::tel('phone', null ,['class' => 'mobileNum','id' => 'mobile','placeholder'=> 'Enter your mobile no. *']) }}

                                @if($errors->has('phone'))
                                    <label class="has-error" for="phone">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::text('subject', null ,['placeholder'=> 'Enter your subject *']) }}

                                @if($errors->has('subject'))
                                    <label class="has-error" for="subject">{{ $errors->first('subject') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="fieldsets">
                            {{ Form::textarea('message', null ,['placeholder'=> 'Enter your message *']) }}

                            @if($errors->has('message'))
                                <label class="has-error" for="message">{{ $errors->first('message') }}</label>
                            @endif
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="customCheck" checked="checked">
                            <label class="custom-control-label" for="customCheck">I agree to the <a href="javascript:void(0)">Terms &amp; Conditions</a> of Business Name.</label>
                        </div>
                        <div class="fieldsets mt20"> <button type="submit" name="submit" class="lnk btn-main bg-btn">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button> </div>
                        <p class="trm"><i class="fas fa-lock"></i>We hate spam, and we respect your privacy.</p>
                    </form>
                </div>
            </div>
            <div class="col-lg-5 v-center">
                <div class="contact-details">
                    <div class="contact-card wow fadeIn" data-wow-delay=".2s">
                        <div class="info-card v-center">
                            <span><i class="fas fa-phone-alt"></i> Phone:</span>
                            <div class="info-body">
                                <p>{{ $_settings['contact_number_message'] ?? 'Enter Contact Message' }}</p>
                                <a href="phone:{{ $_settings['contact_number'] ?? 'Enter Contact Phone' }}">{{ $_settings['contact_number'] ?? 'Enter Contact Phone' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="email-card mt30 wow fadeIn" data-wow-delay=".5s">
                        <div class="info-card v-center">
                            <span><i class="fas fa-envelope"></i> Email:</span>
                            <div class="info-body">
                                <p>{{ $_settings['contact_email_message'] ?? 'Enter Contact Email Message' }}</p>
                                <a href="email:{{ $_settings['contact_email'] ?? 'Enter Contact Email' }}">{{ $_settings['contact_email'] ?? 'Enter Contact Email' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="skype-card mt30 wow fadeIn" data-wow-delay=".9s">
                        <div class="info-card v-center">
                            <span><i class="fab fa-skype"></i> Skype:</span>
                            <div class="info-body">
                                <p>  <p>{{ $_settings['contact_skype_message'] ?? 'Enter Contact Skype Message' }}</p>
                                <a href="skype:{{ $_settings['contact_skype'] ?? 'Enter Contact Skype' }}">{{ $_settings['contact_skype'] ?? 'Enter Contact Skype' }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>