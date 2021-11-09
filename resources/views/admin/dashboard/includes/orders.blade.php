<div class="row">
    <div class="col-xs-12">
        <div class="table-responsive">
            <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th colspan="8">
                        Filter By: <a href="javascript: void(0);" class="today"> Today</a> | <a
                                href="javascript: void(0);" class="yesterday"> Yesterday</a>
                    </th>
                </tr>
                <tr>
                    <th class="center">
                        <label>
                            <input type="checkbox" class="ace" id="checkAll"/>
                            <span class="lbl"></span>
                        </label>
                    </th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>
                        <i class="icon-time bigger-110 hidden-480"></i>
                        Created at
                    </th>
                    <th>Status</th>
                    <th>Order Status</th>
                    <th>Action</th>
                </tr>
                <tr>
                    {!! Form::open(['url' => route('admin.dashboard'), 'method' => 'GET']) !!}
                    <th class="center">&nbsp;</th>
                    <th>{!! Form::text('filter_name', null, ['class' => 'form-control']) !!}</th>
                    <th>{!! Form::text('filter_email', null, ['class' => 'form-control']) !!}</th>
                    <th>{!! Form::text('filter_phone', null, ['class' => 'form-control']) !!}</th>
                    <th>{!! Form::date('filter_created_at', null, ['class' => 'form-control']) !!}</th>
                    <th>{!! Form::select('filter_status', ['all' => 'All', 'seen' => 'Seen', 'unseen' => 'Unseen'], null, ['class' => 'form-control']) !!}</th>
                    <th>{!! Form::select('filter_delivery_status', ['' => 'All', 'processing' => 'Processing', 'shipped' => 'Shipped', 'delivered' => 'Delivered'], null, ['class' => 'form-control']) !!}</th>
                    <th>
                        <button class="btn btn-xs btn-primary">
                            <i class="icon-filter bigger-120"></i> Filter
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-xs btn-success">
                            <i class="icon-list bigger-120"></i> Reset
                        </a>
                    </th>
                    {!! Form::close() !!}
                </tr>
                </thead>

                <tbody id="table-tbody">

                @if ($data['orderList']->count() > 0)
                    @foreach($data['orderList'] as $row)
                        <tr>

                            <td class="center">
                                <label>
                                    <input type="checkbox" class="ace row_id"
                                           value="{{ $row['id'] }}"/>
                                    <span class="lbl"></span>
                                </label>
                            </td>
                            <td class="hidden-480">{{$row['name']}}</td>
                            <td>{{ $row['email'] }}</td>
                            <td>{{ $row['phone'] }}</td>
                            <td>{{ $row['created_at'] }}</td>
                            <td class="hidden-480">
                                @if ($row['status'] == 1)
                                    <span class="label label-sm label-success">Seen</span>
                                @else
                                    <span class="label label-sm label-warning">Unseen</span>
                                @endif
                            </td>
                            <td>
                                {{ ucfirst($row['delivery_status']) }}
                            </td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{ route('admin.orders.show', $row['id']) }}"
                                       class="btn btn-xs btn-success">
                                        <i class="icon-eye-open bigger-120"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    <tr>
                        <td colspan="9">
                            {!! $data['orderList']->links() !!}
                        </td>
                    </tr>
                @else
                    <tr>
                        <td colspan="9"><p>No data found.</p></td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div><!-- /.table-responsive -->
    </div><!-- /span -->
</div>