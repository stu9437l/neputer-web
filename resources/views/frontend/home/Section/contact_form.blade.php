<form action="{{ route('contact.store') }}" method="post" name="feedback-form" id="form-validation">
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
        <div class="col-md-6 fieldsets-custom custom-number-form-group">
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
        <label><input type="checkbox" id="tac" name="tac" required> I agree to the <a href="javascript:void(0)">Terms &amp; Conditions</a> of {{ $_settings['company'] }}</label>
    </div>
    @if($errors->has('tac'))
        <label class="has-error" for="tac">{{ $errors->first('message') }}</label>
    @endif

    <div class="fieldsets mt20"> <button type="submit" name="submit" class="lnk btn-main bg-btn">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button> </div>
    <p class="trm"><i class="fas fa-lock"></i>We hate spam, and we respect your privacy.</p>
</form>
