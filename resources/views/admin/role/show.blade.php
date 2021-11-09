@extends('admin.include.layout')

@section('title', 'Role::Show')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'Role Details'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
               'page' => 'Role Details',
               'title' => 'Role'
           ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th width="20%">ID</th>
                                        <td>{{ $data['row']->id}}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Role</th>
                                        <td>{{ $data['row']->role }}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Slug</th>
                                        <td>{{ $data['row']->slug}}</td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Hint</th>
                                        <td>{{ $data['row']->hint}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            {{ $data['row']->status == 1 ? 'Active':'Inactive' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $data['row']->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $data['row']->updated_at}}</td>
                                    </tr>
                                </table>
                            </div><!-- /.table-responsive -->
                        </div><!-- /span -->
                    </div><!-- /row -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection




