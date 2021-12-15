
<div class="form-group">
    {!! Form::label('footer_section_description', 'Neputer Footer Description', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::textarea('footer_section_description', $data['settings']['footer_section_description'] ?? null , ['class'=> 'col-xs-10 col-sm-5 ckeditor','autocomplete' => 'off']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('footer_button_link', 'Footer Button Link', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('footer_button_link', $data['settings']['footer_button_link'] ?? null , ['class'=> 'col-xs-10 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<div class="form-group">
    {!! Form::label('footer_button_text', 'Footer Button Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('footer_button_text', $data['settings']['footer_button_text'] ?? null , ['class'=> 'col-xs-10 col-sm-5','autocomplete' => 'off']) !!}
    </div>
</div>

<div class="form-group row">
    <label class="col-sm-3 control-label no-padding-right" for="">Copy Right Message <br> <small>Insert <code> %Year% </code> for current year</small></label>

    <div class="col-sm-9">
        {!! Form::textarea('copyright_message', $data['settings']['copyright_message'] ?? null, ['class' => 'col-xs-10 col-sm-5 ckeditor','placeholder' => 'Description', 'autocomplete' => 'off']) !!}
    </div>

</div>
