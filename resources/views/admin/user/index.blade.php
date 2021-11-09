@extends('admin.include.layout')

@section('title', 'User::List')

@section('content')

    <div class="main-content">


        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'List'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'List',
                'title' => 'Users'
            ])


            @include('admin.include.display_flash_data')

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th colspan="2">
                                            {{Form::open(['url' => route($base_route.'.bulkAction'), 'id' => 'bulk-action-form', 'method'=>'post'])}}
                                            {{ Form::select('bulk_actions', $bulk_action, null, ['class'=>'form-inline']) }}
                                            {{ Form::hidden('row_ids', null, ['id'=>'row_ids']) }}
                                            <button type="button" class="btn btn-xs btn-primary"
                                                    id="bulk-action-submit-btn">
                                                <i class="icon-circle-arrow-right bigger-120"></i>Submit
                                            </button>
                                            {{ Form::close() }}
                                        </th>
                                        <th colspan="7">
                                        </th>
                                    </tr>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" id="checkAll"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Profile Image</th>
                                        <th>Roles</th>
                                        <th class="hidden-480">Created At</th>

                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Updated At
                                        </th>
                                        <th class="hidden-480">Status</th>

                                        <th></th>
                                    </tr>
                                    <tr>
                                        {{Form::open(['url' => route($base_route.('.index')), 'method'=>'get'])}}
                                        <th></th>
                                        <th>{{ Form::text('filter_name', null, ['class'=>'form_control']) }}</th>
                                        <th>{{ Form::text('filter_email', null, ['class'=>'form_control']) }}</th>
                                        <th> &nbsp;</th>
                                        <th> &nbsp;</th>
                                        <th>{{ Form::date('filter_created_at', null, ['class'=>'form_control']) }}</th>
                                        <th>{{ Form::date('filter_updated_at', null, ['class'=>'form_control']) }}</th>
                                        <th>{{ Form::select('filter_status', ['all' => 'All', 'active' => 'Active', 'inactive'=>'Inactive'], null, ['class'=>'form_control']) }}</th>
                                        <th>
                                            <button class="btn btn-xs btn-primary">
                                                <i class="icon-filter bigger-120"></i>Filter
                                            </button>
                                            <a href="{{ route($base_route.'.index') }}" class="btn btn-xs btn-success">
                                                <i class="icon-list bigger-120"></i>Reset
                                            </a>
                                        </th>
                                        {{ Form::close() }}
                                    </tr>
                                    </thead>

                                    <tbody id="table-tbody">
                                    @if($data['rows']->count() > 0)
                                        @foreach($data['rows'] as $val)
                                            <tr>
                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace row_id"
                                                               value="{{ $val->id }}"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>

                                                <td>
                                                    {{ join(' ', [
                                                        $val->first_name,
                                                        $val->middle_name,
                                                        $val->last_name,
                                                    ]) }}

                                                </td>
                                                <td>{{ $val->email }}</td>

                                                <td>
                                                    <img src="{{ ViewHelper::getImagePath($folder, $val->profile_image)}}"
                                                         width="50"/>

                                                </td>
                                                <td>
                                                    {{ '|' }}
                                                    @foreach($val->roles as $role)
                                                        {{ $role->role. ' |' }}
                                                    @endforeach

                                                </td>
                                                <td class="hidden-480">{{ $val->created_at }}</td>
                                                <td>{{ $val->updated_at }}</td>

                                                <td class="hidden-480">
                                                    @if($val->status == 1)
                                                        <span class="label label-sm label-success">Active</span>
                                                    @else($val->status == 0)
                                                        <span class="label label-sm label-warning">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route($base_route.'.show', $val->id) }}"
                                                           class="btn btn-xs btn-success">
                                                            <i class="icon-eye-open bigger-120"></i>
                                                        </a>

                                                        <a href="{{route($base_route.'.edit', $val->id)}}"
                                                           class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>

                                                        @if($val->isDeletable())
                                                            <button class="btn btn-xs btn-danger bootbox-confirm">
                                                                <i class="icon-trash bigger-120"></i>
                                                            </button>
                                                            {{ Form::open(['url'=>route($base_route.'.destroy', $val->id), 'method'=>'delete']) }}
                                                            {{ Form::close() }}
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @else
                                        <tr>
                                            <td colspan="9">No Data Found.</td>
                                        </tr>
                                    @endif


                                    </tbody>
                                </table>
                                {{ $data['rows']->links() }}
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


