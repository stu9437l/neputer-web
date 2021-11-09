@extends('admin.include.layout')

@section('title', 'Service Enquiry::List')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'List'
        ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Show',
                'title' => 'Contact',
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    @include('admin.include.display_flash_data')

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" id="checkAll"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Message</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Created at
                                        </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        {!! Form::open(['url' => route($base_route.'.index'), 'method' => 'GET']) !!}
                                        <th class="center">&nbsp;</th>
                                        <th>{!! Form::text('filter_name',  request('filter_name') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::text('filter_email',  request('filter_email') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::text('filter_message', request('filter_message') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::date('filter_created_at', request('filter_created_at') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::select('filter_status', ['all' => 'All', 'seen' => 'Seen', 'unseen' => 'Unseen'], request('filter_status') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>
                                            <button class="btn btn-xs btn-primary">
                                                <i class="icon-filter bigger-120"></i> Filter
                                            </button>
                                            <a href="{{ route($base_route.'.index') }}" class="btn btn-xs btn-success">
                                                <i class="icon-list bigger-120"></i> Reset
                                            </a>
                                        </th>
                                        {!! Form::close() !!}
                                    </tr>
                                    </thead>

                                    <tbody id="table-tbody">

                                    @if ($data['rows']->count() > 0)
                                        @foreach($data['rows'] as $row)
                                            <tr>
                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace row_id"
                                                               value="{{ $row->id }}"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td class="hidden-480">{{$row->name}}</td>
                                                <td>{{ $row->email }}</td>
                                                <td>{{ $row->message }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td class="hidden-480">
                                                    @if ($row->status == 1)
                                                        <span class="label label-sm label-success">Seen</span>
                                                    @else
                                                        <span class="label label-sm label-warning">Unseen</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route($base_route.'.show', $row->id) }}"
                                                           class="btn btn-xs btn-success">
                                                            <i class="icon-eye-open bigger-120"></i>
                                                        </a>
                                                       @if($row->status == 1)
                                                        <button class="btn btn-xs btn-danger bootbox-confirm">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </button>
                                                        {!! Form::open(['url' => route($base_route.'.destroy', $row->id), 'method' => 'delete']) !!}
                                                        {!! Form::close() !!}
                                                           @endif
                                                    </div>
                                                </td>
                                            </tr>

                                        @endforeach
                                        <tr>
                                            <td colspan="9">{!! $data['rows']->links() !!}</td>
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
                    </div><!-- /row -->

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_libraries')

    @include('admin.include.common_libs')

@endsection


@section('js_scripts')

    @include('admin.include.common_scripts')

@endsection