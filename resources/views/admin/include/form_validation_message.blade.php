@if ($errors->has($field))
    <span class="col-md-offset-3 alert-danger notify-danger">
        <strong>{{ $errors->first($field) }}</strong>
    </span>
@endif