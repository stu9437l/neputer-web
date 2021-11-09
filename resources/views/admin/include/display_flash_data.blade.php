@if(session()->has('success-message'))
    <div class="alert alert-success">
        <p>{!! session()->get('success-message') !!}</p>
    </div>
@endif

@if(session()->has('error-message'))
    <div class="alert alert-warning">
        <p>{!! session()->get('error-message')  !!} </p>
    </div>
@endif

