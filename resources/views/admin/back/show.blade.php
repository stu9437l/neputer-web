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
                'title' => ''
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
                                        <td>Slug</td>
                                        <td>{{ $data['row']->slug }}</td>
                                    </tr>
                                    <tr>
                                        <td>description</td>
                                        <td>{!! $data['row']->description !!}</td>
                                    </tr>
                                  
                                    <tr>
                                        <td>Banner_Image</td>
                                        <td> <img src="{{ ViewHelper::getImagePath($folder, $data['row']->banner) }}" width="300"></td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            <label class="label label-{{$data['row']->status == 1 ? 'success':'warning'}}">
                                                {{ $data['row']->status == 1 ? 'Active':'Inactive' }}
                                            </label>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Seo Title</td>
                                        <td>{!! $data['row']->seo_title !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Seo Description</td>
                                        <td>{!! $data['row']->seo_description !!}</td>
                                    </tr>
                                    <tr>
                                        <td>Seo Keyword</td>
                                        <td>{!! $data['row']->seo_keyword !!}</td>
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
