@extends('admin.include.layout')

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'View'
       ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'View',
                'title' => '',
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
                                        <th width="10%">Column</th>
                                        <th width="40%">Value</th>
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <th>Id</th>
                                        <td>{{ $data['row']->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Title</th>
                                        <td>{{ $data['row']->title }}</td>
                                    </tr>
                                    <tr>
                                        <th>Slug</th>
                                        <td>{{$data['row']->slug}}</td>
                                    </tr>
                                    <tr>
                                        <th>Ad Type</th>
                                        <td>{{$data['row']->ad_type}}</td>
                                    </tr>
                                    <tr>
                                    @if($data['row']->ad_type == 'banner')
                                            <th>Banner</th>
                                            <td>
                                                <img src="{{ ViewHelper::getImagePath($folder, $data['row']->banner) }}" width="500" class="img-responsive">
                                            </td>
                                        @else
                                            <th>Script</th>
                                            <td>{{$data['row']->content}}</td>
                                    @endif
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>{{$data['row']->status == 1 ? 'Active':'Inactive'}}</td>
                                    </tr>
                                    <tr>
                                        <th>Hint</th>
                                        <td>{{$data['row']->hint}}</td>
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
