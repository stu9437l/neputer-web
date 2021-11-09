@extends('admin.include.layout')

@section('title', 'Career::Show')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'View'
       ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'View',
                'title' => $panel,
                'id' => $data['row']->id,
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th width="20%">Column</th>
                                        <th width="40%">Value</th>

                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td>Id</td>
                                        <td>{{ $data['row']->id }}</td>

                                    </tr>
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $data['row']->title }}</td>
                                    </tr>
                                    <tr>
                                        <td>Overview</td>
                                        <td>{!! $data['row']->overview !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Requirement Experience</td>
                                        <td>{!! $data['row']->requirement_experience !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Skills</td>
                                        <td>{!! $data['row']->skills !!}</td>
                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td>{{ $data['row']->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td>{{ $data['row']->updated_at}}</td>
                                    </tr>
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
