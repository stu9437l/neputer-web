<div class="col-xs-12">
    <!-- PAGE CONTENT BEGINS -->

    <div class="row">
        <div class="col-xs-12">
            <div class="table-responsive">
                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="center">
                            <label>Sort</label>
                        </th>
                        <th>Choose Ad</th>
                        <th>
                            <i class="icon-time bigger-110 hidden-480"></i>
                            Start Date
                        </th>
                        <th>
                            <i class="icon-time bigger-110 hidden-480"></i>
                       End Date
                        </th>
                        <th>
                            Status
                        </th>
                        <th>
                            <a href="javascript:void(0);" class="btn btn-xs btn-success" id="load_page_row">
                                <i class="icon-plus bigger-120"></i>
                            </a>
                        </th>

                    </tr>
                    </thead>

                    <tbody id="table-tbody">

                        @foreach($data['ads_section_ads'] as $row)

                            <tr>
                                <td class="center">
                                    <label>
                                        <i class="icon-sort"></i>
                                    </label>
                                </td>
                                <td>
                                    {!! Form::select('ad[]', $data['ads'], $row->id, ['class' => 'form-control']) !!}
                                </td>
                                <td>{!! Form::date('start_date[]',$row->start_date, ['class' => 'form-control']) !!}</td>
                                <td> {!! Form::date('end_date[]' , $row->end_date, ['class' => 'form-control']) !!}</td>
                                <td class="hidden-480">
                                    @if ($row->end_date >= $now )
                                        <span class="label  label-sm label-success">Active</span>
                                    @elseif($row->end_date < $now )
                                        <span class="label label-sm label-warning">Expired</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="btn-group">
                                        <a href="javascript:void(0);"
                                           class="btn btn-xs btn-info remove-row">
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

</div>

@section('page_scripts')

    <script type="text/javascript">

        $(document).ready(function () {

            $('#load_page_row').click(function () {

                $.ajax({
                    url: '{{ route($base_route.'.load-ad-html') }}',
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                    },
                    success: function (response) {
                        $('#table-tbody').append(response.html);
                    }
                });

            });

            $('body').on('click', '.remove-row', function () {
                var $this = $(this);
                $this.closest('tr').remove();
            });

        });

    </script>

    @endsection