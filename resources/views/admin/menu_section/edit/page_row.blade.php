<tr>
    <td class="center">
        <label>
            <i class="icon-sort"></i>
        </label>
    </td>
    <td>
        {!! Form::select('page[]', $pages, null, ['class'=>'form-control']) !!}
    </td>
    <td>
        <div class="btn-group">
            <a href="javascript:void(0)" class="btn btn-xs btn-danger remove-row">
                <i class="icon-remove bigger-120"></i>
            </a>
        </div>
    </td>
</tr>