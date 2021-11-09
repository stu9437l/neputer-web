@extends('admin.include.layout')

@section('title', 'User::Show')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'User Details'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
               'page' => 'View',
               'title' => 'Users',
               'id' => $data['row']->id,
           ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <tr>
                                        <th>Column</th>
                                        <th>Value</th>
                                        <th width="300">Profile Image</th>
                                    </tr>
                                    <tr>
                                        <th width="20%">ID</th>
                                        <td>{{ $data['row']->id}}</td>
                                        <td rowspan="8">
                                            @if($data['user_detail']->profile_image)
                                                <img src="{{ ViewHelper::getImagePath($folder, $data['user_detail']->profile_image) }}" width="300">
                                            @else
                                                {{ 'Image N/A' }}
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Email</th>
                                        <td>{{ $data['row']->email }}</td>

                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            {{ $data['row']->status == 1 ? 'Active':'Inactive' }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Full Name</th>
                                        <td>{{ join(' ', [
                                            $data['user_detail']->first_name,
                                            $data['user_detail']->middle_name,
                                            $data['user_detail']->last_name
                                        ])  }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender</th>
                                        <td>{{ ucfirst($data['user_detail']->gender)}}</td>
                                    </tr>
                                    <tr>
                                        <th>Assigned Role</th>
                                        <td>
                                            @foreach($data['row']->roles as $role)
                                                {{ $role->role .'|'}}
                                                @endforeach
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




