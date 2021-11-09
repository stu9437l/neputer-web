<div class="form-group required">

    {!! Form::label('email', 'Email Address', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::email('email', null, ['class' => 'col-xs-10 col-sm-5', 'required']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'email'
    ])

</div>

@if(!isset($data['row']))
    <div class="form-group required">

        {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-9">

            {!! Form::password('password', ['class' => 'col-xs-10 col-sm-5', 'required']) !!}

        </div>

        @include('admin.include.form_validation_message', [
            'field' => 'password'
        ])

    </div>

    <div class="form-group required">

        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-9">

            {!! Form::password('password_confirmation', ['class' => 'col-xs-10 col-sm-5', 'required']) !!}

        </div>

        @include('admin.include.form_validation_message', [
            'field' => 'password_confirmation'
        ])

    </div>
@endif


<div class="form-group required">

    {!! Form::label('first_name', 'First Name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('first_name', null, ['placeholder' => 'First Name', 'class' => 'col-xs-10 col-sm-5', 'required']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'first_name'
    ])

</div>

<div class="form-group">

    {!! Form::label('middle_name', 'Middle Name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('middle_name', null, ['placeholder' => 'Middle Name', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'middle_name'
    ])

</div>

<div class="form-group required">

    {!! Form::label('last_name', 'Last Name', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('last_name', null, ['placeholder' => 'Last Name', 'class' => 'col-xs-10 col-sm-5', 'required']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'last_name'
    ])

</div>


@if(isset($data['row']))
    <div class="form-group">
        {!! Form::label('image', 'Current Profile Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
        @if($data['user_detail']->profile_image)
            <div class="col-sm-9">
                <img src="{{ ViewHelper::getImagePath($folder, $data['user_detail']->profile_image) }}" width="200"
                     class="img-responsive">
            </div>
        @else
            <div class="col-sm-9">
                <img src="{{ ViewHelper::getImagePath($folder, 'no_image.jpg') }}" width="200" class="img-responsive">
            </div>
        @endif
    </div>
@endif

<div class="form-group">

    {!! Form::label('image', 'Profile Image', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::file('image', ['class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'image'
    ])

</div>


<div class="form-group">
    {!! Form::label('status', 'Status', ['class'=>'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        <div class="control-group">
            <div class="radio">
                <label>
                    {!! Form::radio('status', 1, true, ['class'=>'ace']) !!}
                    <span class="lbl"> Active</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    {!! Form::radio('status', 0, false, ['class'=>'ace']) !!}
                    <span class="lbl"> Inactive </span>
                </label>
            </div>
        </div>
    </div>

</div>


<div class="form-group required">
    {!! Form::label('role', 'Assign Roles', ['class'=>'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        <div class="control-group">
            @if(isset($data['roles']))
                @foreach($data['roles'] as $role)
                    <div class="radio">
                        <label>
                            @if(!isset($data['row']))
                                {!! Form::checkbox('role[]', $role->id, false, ['class'=>'ace', 'required']) !!}
                            @else
                                {!! Form::checkbox('role[]', $role->id, array_key_exists($role->id, $data['user_roles'])?true:false, ['class'=>'ace', 'required']) !!}
                            @endif
                            <span class="lbl"> {{ $role->role }}</span>
                        </label>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
    @include('admin.include.form_validation_message', [
        'field' => 'role'
    ])
</div>




@if(isset($data['row']))
    <hr>

    <div class="form-group">

        {!! Form::label('password', 'Password', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-9">

            {!! Form::password('password', ['class' => 'col-xs-10 col-sm-5']) !!}

        </div>

        @include('admin.include.form_validation_message', [
            'field' => 'password'
        ])

    </div>

    <div class="form-group">

        {!! Form::label('password_confirmation', 'Confirm Password', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

        <div class="col-sm-9">

            {!! Form::password('password_confirmation', ['class' => 'col-xs-10 col-sm-5']) !!}

        </div>

        @include('admin.include.form_validation_message', [
            'field' => 'password_confirmation'
        ])

    </div>
@endif
