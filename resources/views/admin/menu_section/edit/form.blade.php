<div class="form-group required">

    {!! Form::label('title', 'Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'col-xs-10 col-sm-5', 'required']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'title'
    ])

</div>
<hr>

<div class="form-group required">

    {!! Form::label('hint', 'Hint', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">

        {!! Form::text('hint', null, ['placeholder' => 'Hint', 'class' => 'col-xs-10 col-sm-5']) !!}

    </div>

    @include('admin.include.form_validation_message', [
        'field' => 'hint'
    ])

</div>