@extends('admin.include.layout')

@section('title', 'Menu Section::List')

@section('content')

    <div class="main-content">


        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            /*'panel' => $panel, // panel value added directly through view composer - base controller*/
            'page' => 'List'
        ])

        <div class="page-content">
            @include('admin.include.page-header', [
                'page' => 'null',
                'title' => 'Menu Section'
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
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" id="check_all"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Role</th>
                                        <th>Slug</th>
                                        <th class="hidden-480">Created At</th>

                                        <th>
                                            <i class="icon-time bigger-110 hidden-480"></i>
                                            Updated At
                                        </th>
                                        <th></th>
                                    </tr>
                                    </thead>

                                    <tbody id="tbody-checkboxes">
                                    @if($data['rows']->count() > 0)
                                    @foreach($data['rows'] as $val)
                                        <tr>
                                            <td class="center">
                                                <label>
                                                    <input type="checkbox" class="ace row_id" value="{{ $val->id }}"/>
                                                    <span class="lbl"></span>
                                                </label>
                                            </td>

                                            <td>{{ $val->title }}</td>
                                            <td>{{ $val->slug }}</td>
                                            <td class="hidden-480">{{ $val->created_at }}</td>
                                            <td>{{ $val->updated_at }}</td>

                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{route($base_route.'.edit', $val->id)}}" class="btn btn-xs btn-info">
                                                        <i class="icon-edit bigger-120"></i>
                                                    </a>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    @else
                                        <tr>
                                            <td colspan="7">No Data Found.</td>
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


