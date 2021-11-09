@extends('admin.include.layout')

@section('title', 'Page::Show')

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
                                    <tr>
                                        <th>Column</th>
                                        <th>Value</th>
                                        <th width="300">Page Image</th>
                                    </tr>
                                    <tr>
                                        <th width="20%">ID</th>
                                        <td>{{ $data['row']->id}}</td>
                                        <td rowspan="8">
                                            <img src="{{ ViewHelper::getImagePath($folder, $data['row']->image) }}"
                                                 width="300">
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="20%">Title</th>
                                        <td>{{ $data['row']->title}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">Slug</th>
                                        <td>{{ $data['row']->slug}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">Title</th>
                                        <td>{{ $data['row']->title}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">Open In</th>
                                        <td>{{ $data['row']->open_in}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">Page Type</th>
                                        <td>{{ $data['row']->page_type}}</td>

                                    </tr>
                                    <tr>
                                        @if(isset($data['row']->link))
                                            <th width="20%">Link</th>
                                            <td>{{ $data['row']->link}}</td>
                                        @else
                                            <th width="20%">Content</th>
                                            <td>{!!  $data['row']->content !!}</td>
                                        @endif

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
                                        <th width="20%">Hint</th>
                                        <td colspan="2">{{ $data['row']->hint}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">SEO Descriptions</th>
                                        <td colspan="2">{{ $data['row']->seo_desc}}</td>

                                    </tr>
                                    <tr>
                                        <th width="20%">SEO Keywords</th>
                                        <td colspan="2">{{ $data['row']->seo_keys}}</td>

                                    </tr>

                                    <tr>
                                        <th>Created At</th>
                                        <td colspan="2">{{ $data['row']->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated At</th>
                                        <td colspan="2">{{ $data['row']->updated_at}}</td>
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




