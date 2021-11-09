@extends('admin.include.layout')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'List'
        ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'List',
                'base_route' => $base_route,
                 'title' => ''
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
                                        <th colspan="9">
                                            <div class="widget-main">
                                                {!! Form::open(['url' => route($base_route.'.bulk-action'), 'id' => 'bulk-action-form', 'class' => 'form-inline']) !!}
                                                {!! Form::select('bulk_actions', $bulk_action, null, [
                                                    'class' => 'input-small'
                                                ]) !!}
                                                {!! Form::hidden('row_ids', null, ['id' => 'row_ids']) !!}
                                                <button type="button" class="btn btn-info btn-xs"
                                                        id="bulk-action-submit-btn">
                                                    <i class="icon-key bigger-110"></i>
                                                    Submit
                                                </button>
                                                {!! Form::close() !!}

                                            </div>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" id="checkAll"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Banner</th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Created at
                                        </th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Updated at
                                        </th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        {!! Form::open(['url' => route($base_route.'.index'), 'method' => 'GET']) !!}
                                        <th class="center">&nbsp;</th>
                                        <th>{!! Form::text('filter_title', null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::text('filter_slug', null, ['class' => 'form-control']) !!}</th>
                                        <th>&nbsp;</th>
                                        <th>{!! Form::date('filter_created_at', null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::date('filter_updated_at', null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::select('filter_status', ['all' => 'All', 'active' => 'Active', 'inactive' => 'Inactive'], null, ['class' => 'form-control']) !!}</th>
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
                                                        <input type="checkbox" class="ace row_id" value="{{ $row->id }}"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td class="hidden-480">{{$row->title}}</td>
                                                <td>{{ $row->slug }}</td>

                                                <td>
                                                    <img src="{{ ViewHelper::getImagePath(AppHelper::getFolderName('back'), $row->image) }}"
                                                         width="150">

                                                </td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>{{ $row->updated_at }}</td>
                                                <td class="hidden-480">
                                                    @if ($row->status == 1)
                                                        <span class="label label-sm label-success">Active</span>
                                                    @else
                                                        <span class="label label-sm label-warning">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route($base_route.'.show', $row->id) }}"
                                                           class="btn btn-xs btn-success">
                                                            <i class="icon-eye-open bigger-120"></i>
                                                        </a>

                                                        <a href="{{ route($base_route.'.edit', $row->id) }}"
                                                           class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>


                                                        <button class="btn btn-xs btn-danger bootbox-confirm">
                                                            <i class="icon-trash bigger-120"></i>
                                                        </button>
                                                        {!! Form::open(['url' => route($base_route.'.destroy', $row->id), 'method' => 'delete']) !!}
                                                        {!! Form::close() !!}


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