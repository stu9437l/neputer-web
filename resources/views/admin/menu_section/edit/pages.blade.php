<div class="row">
    <div class="col-xs-12">
        <!-- PAGE CONTENT BEGINS -->

        <div class="row">
            <div class="col-xs-12">
                <div class="table-responsive">
                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th class="center">
                                Sort
                            </th>
                            <th>Select Pages</th>
                            <th><div class="btn-group">
                                    <a href="javascript:void(0)" class="btn btn-xs btn-success" id="load_page_row">
                                        <i class="icon-plus bigger-120"></i>
                                    </a>

                                </div></th>
                        </tr>
                        </thead>

                        <tbody id="tbody-checkboxes">
                        @foreach($data['menu_section_page'] as $row)
                            <tr>
                                <td class="center">
                                    <label>
                                        <i class="icon-sort"></i>
                                    </label>
                                </td>
                                <td>
                                    {!! Form::select('page[]', $data['pages'], $row->id, ['class'=>'form-control']) !!}
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:void(0)" class="btn btn-xs btn-danger remove-row">
                                            <i class="icon-remove bigger-120"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div><!-- /.table-responsive -->
            </div><!-- /span -->
        </div><!-- /row -->
    </div><!-- /.col -->
</div>

@section('page_scripts')

    <script type="text/javascript">

        $(document).ready(function () {

            $('#load_page_row').click(function () {

                $.ajax({
                    url: '{{ route($base_route.'.load-page-html') }}',
                    method: 'POST',
                    data : {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {

                        $('#tbody-checkboxes').append(response.html);
                    }
                })
            })


            $('body').on('click', '.remove-row', function () {
                var $this = $(this);
                $this.closest('tr').remove();
            })
        })
    </script>

    @endsection