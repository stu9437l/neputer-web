<div class="form-group">
    {!! Form::label('title', 'Ad Title', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('title', null, ['placeholder' => 'Title', 'class' => 'col-xs-10 col-sm-5', ]) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'title'])
</div>
<div class="form-group">
    {!! Form::label('ad_type', 'Ad Type', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::select('ad_type', ['banner' => 'Banner', 'script'=>'Script'], null, ['class' => 'form-inline', 'id'=>'ad_type']) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'ad_type'])
</div>
<div class="form-group" id="content"
     @if(isset($data['row']) && $data['row']->ad_type == 'script')style="display: block;"
     @else style="display: none;" @endif>
    {!! Form::label('content', 'Content', ['class' => 'col-sm-3 control-label no-padding-right']) !!}

    <div class="col-sm-9">
        {!! Form::textarea('content', null, ['placeholder'=>'Content', 'class' => 'col-xs-10 col-sm-5 ']) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'content'])
</div>

@if(isset($data['row']) && $data['row']->ad_type == 'banner')
    <div class="form-group banner">
        {!! Form::label('image', 'Existing Banner', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
        <div class="col-sm-9">
            <img src="{{ ViewHelper::getImagePath($folder, $data['row']->banner) }}" width="200">
        </div>
    </div>
@endif

<div class="form-group banner" @if(isset($data['row']) && $data['row']->ad_type == 'banner') style="display: block;"
     @else style="display: none;" @endif>
    {!! Form::label('image', 'Ad Banner', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::file('image', ['class' => 'col-xs-10 col-sm-5']) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'image'])
</div>
<div class="space-4"></div>

<div class="form-group">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

    <div class="col-sm-9">
        <div class="control-group">
            <div class="radio">
                <label>
                    {!! Form::radio('status', 1, true, ['class' => 'ace']) !!}
                    <span class="lbl"> Active</span>
                </label>
            </div>

            <div class="radio">
                <label>
                    {!! Form::radio('status', 0, false, ['class' => 'ace']) !!}
                    <span class="lbl"> Inactive</span>
                </label>
            </div>
        </div>
    </div>
    @include('admin.include.form_validation_message', ['field' => 'status'])
</div>

<div class="form-group">
    {!! Form::label('hint', 'Hint', ['class' => 'col-sm-3 control-label no-padding-right']) !!}
    <div class="col-sm-9">
        {!! Form::text('hint', null, ['placeholder' => 'Hint', 'class' => 'col-xs-10 col-sm-5']) !!}
    </div>
    @include('admin.include.form_validation_message', ['field' => 'hint'])
</div>
