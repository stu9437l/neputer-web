@extends('admin.include.layout')

@section('title', 'Why us::list')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'List'
       ])
        <div class="page-content">

            @include('admin.include.page-header', [
               'page' => 'List',
               'base_route'=>$base_route,
               'title' => $panel,
               ])

            <div class="row">
                <div class="col-xs-12">
                    @include('admin.include.display_flash_data')
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="6">
                                            <a href="{{ route($base_route.'.manage-rank') }}"
                                               class="btn btn-info btn-sm" id="manage_rank"><i class="icon-sort"></i>
                                                Manage Rank</a>
                                        </th>
                                    </tr>
                                    <tr>
{{--                                        <th class="center">--}}
{{--                                            <label>--}}
{{--                                                <input type="checkbox" class="ace" id="checkAll"/>--}}
{{--                                                <span class="lbl"></span>--}}
{{--                                            </label>--}}
{{--                                        </th>--}}
                                        <th>Name</th>

                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Created at
                                        </th>
                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Updated at
                                        </th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        {!! Form::open(['url' => route($base_route.'.index'), 'method' => 'GET']) !!}
{{--                                        <th class="center">&nbsp;</th>--}}
                                        <th>{!! Form::text('filter_title', request('filter_title') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::date('filter_created_at', request('filter_created_at') ?? null, ['class' => 'form-control']) !!}</th>
                                        <th>{!! Form::date('filter_updated_at', request('filter_updated_at') ?? null, ['class' => 'form-control']) !!}</th>
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

                                    @forelse($data['rows'] as $row)
                                        <tr>
{{--                                            <td class="center">--}}
{{--                                                <label>--}}
{{--                                                    <input type="checkbox" class="ace row_id"--}}
{{--                                                           value="{{ $row->id }}"/>--}}
{{--                                                    <span class="lbl"></span>--}}
{{--                                                </label>--}}
{{--                                            </td>--}}
                                            <td class="hidden-480">{{$row->title}}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->updated_at }}</td>

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
                                                    {!! Form::open(['url' => route($base_route.'.destroy', $row->id         ), 'method' => 'delete']) !!}
                                                    {!! Form::close() !!}


                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9"><p>No data found.</p></td>
                                        </tr>
                                    @endforelse
                                    {{-- <tr>
                                         <td colspan="9">{!! $data['rows']->links() !!}</td>
                                     </tr>--}}

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
