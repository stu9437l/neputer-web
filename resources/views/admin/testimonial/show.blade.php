@extends('admin.include.layout')

@section('title', 'Testimonial Show')

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
                                        <th width="10%">Column</th>
                                        <th width="40%">Value</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <th>Testimonial By</th>
                                        <td>{{$data['row']->testimonial_by}}</td>
                                    </tr>
                                    <tr>
                                        <th>Designation</th>
                                        <td>{{$data['row']->designation}}</td>
                                    </tr>
                                    <tr>
                                        <th>Testimonial</th>
                                        <td>{{$data['row']->testimonial}}</td>
                                    </tr>
                                    <tr>
                                        <th>Image</th>
                                        <td>
                                            <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}"
                                                 width="300">
                                        </td>
                                    </tr>

                                    <tr>
                                        <th>Rank</th>
                                        <td>{{$data['row']->order}}</td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <label class="label label-{{$data['row']->status == 1 ? 'success':'warning'}}">
                                                {{ $data['row']->status == 1 ? 'Active':'Inactive' }}
                                            </label>
                                        </td>
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
