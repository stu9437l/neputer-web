<tr>
    <td class="center">
        <label>
            <i class="icon-sort"></i>
        </label>
    </td>
    <td>{!! Form::select('ad[]', $ads, null, ['class' => 'form-control']) !!}</td>
    <td>{!! Form::date('start_date[]',null, ['class' => 'form-control']) !!}</td>
    <td> {!! Form::date('end_date[]', null, ['class' => 'form-control']) !!}</td>
    <td> </td>

    <td>
        <div class="btn-group">
            <a href="javascript:void(0);"
               class="btn btn-xs btn-info remove-row">
                <i class="icon-remove bigger-120"></i>
            </a>
        </div>

    </td>
</tr>