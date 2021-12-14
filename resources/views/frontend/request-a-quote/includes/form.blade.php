<section class="contact-page pad-tb section-nx">
    <div class="container">
        @include('admin.include.display_flash_data')
        <div class="row justify-content-center">
            <div class="col-lg-6 v-center">
                <div class="common-heading text-l">
                    <span>{{ $_settings['quotes_title'] ?? 'Request a Title' }}</span>
                    <h2 class="mt0 mb0">{{ $_settings['quotes_subtitle'] ?? 'Request a Title' }}</h2>
                </div>
                <br>
                <div class="form-block">
                    <form action="{{ route('request-a-quote.store') }}" method="post" name="feedback-form">
                        @csrf
                        <div class="fieldsets row">
                            <div class="col-md-6">
                                {{ Form::text('name', null ,['placeholder'=> 'Enter your name *','required']) }}
                                @if($errors->has('name'))
                                    <label class="has-error" for="name">{{ $errors->first('name') }}</label>
                                @endif
                            </div>
                            @include('admin.include.form_validation_message', [
                                'field' => 'name'
                            ])
                            <div class="col-md-6">
                                {{ Form::email('email', null ,['placeholder'=> 'Enter your email *','required']) }}
                                @if($errors->has('email'))
                                    <label class="has-error" for="email">{{ $errors->first('email') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="fieldsets row">
                            <div class="col-md-6">
                                {{ Form::tel('phone', null ,['placeholder'=> 'Enter your phone *','required']) }}

                                @if($errors->has('phone'))
                                    <label class="has-error" for="phone">{{ $errors->first('phone') }}</label>
                                @endif
                            </div>
                            <div class="col-md-6">
                                {{ Form::select('service', $data['services']  , null ,  ['class'=>'from-control']) }}
                                @if($errors->has('service'))
                                    <label class="has-error" for="service">{{ $errors->first('service') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="fieldsets">
                            {{ Form::textarea('message', null ,['placeholder'=> 'Enter your message *','required']) }}

                            @if($errors->has('message'))
                                <label class="has-error" for="message">{{ $errors->first('message') }}</label>
                            @endif
                        </div>
<!--                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="customCheck" name="example1" checked="checked">
                            <label class="custom-control-label" for="customCheck">I agree to the <a href="javascript:void(0)">Terms &amp; Conditions</a> of Business Name.</label>
                        </div>-->

                        <div class="custom-control">
                            <label><input type="checkbox" id="tac" name="tac" required> I agree to the <a href="javascript:void(0)">Terms &amp; Conditions</a> of {{ $_settings['company'] }}</label>
                        </div>

                        <div class="fieldsets mt20"> <button type="submit" name="submit" class="lnk btn-main bg-btn">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button> </div>
                        <p class="trm"><i class="fas fa-lock"></i>We hate spam, and we respect your privacy.</p>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>