<div class="form-group required">
    {!! Form::label('year', 'Year', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-7">
        {!! Form::text('year', null, ['placeholder' => 'Title', 'class' => 'form-control pick-year', 'required']); !!}
        @if($errors->has('year'))
            <label class="has-error" for="year">{{ $errors->first('year') }}</label>
        @endif
    </div>
</div>

<div class="form-group required">
    {!! Form::label('detail', 'Description', ['class' => 'col-sm-3 control-label no-padding-right']); !!}
    <div class="col-sm-8">
        {!! Form::textarea('detail', null, ['placeholder' => 'Enter Description', 'class' => 'form-control ckeditor', 'required']); !!}
        @if($errors->has('detail'))
            <label class="has-error" for="detail">{{ $errors->first('detail') }}</label>
        @endif
    </div>
</div>

<div class="form-group required">
    <label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Status </label>

    <div class="col-sm-7">
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
    @if($errors->has('description'))
        <label class="has-error" for="description">{{ $errors->first('description') }}</label>
    @endif
</div>





