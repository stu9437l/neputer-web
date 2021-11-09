@extends('admin.include.layout')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route.'.index',
            'page' => 'List'
        ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'List',
                'title' => '',
            ])

            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    @include('admin.include.display_flash_data')

                    <div class="row">
                        <div class="col-xs-12">
                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="center">
                                            <label>
                                                <input type="checkbox" class="ace" id="checkAll"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Title</th>
                                        <th>Slug</th>
                                        <th>Hint</th>
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
                                    </thead>

                                    <tbody id="table-tbody">

                                    @if ($data['rows']->count() > 0)
                                        @foreach($data['rows'] as $row)

                                            <tr>

                                                <td class="center">
                                                    <label>
                                                        <input type="checkbox" class="ace row_id" value="{{ $row->id }}"/>
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td>{{ $row->title }}</td>
                                                <td>{{ $row->slug }}</td>
                                                <td>{{ $row->hint }}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>{{ $row->updated_at }}</td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route($base_route.'.edit', $row->id) }}"
                                                           class="btn btn-xs btn-info">
                                                            <i class="icon-edit bigger-120"></i>
                                                        </a>


                                                    </div>

                                                </td>
                                            </tr>

                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="7"><p>No data found.</p></td>
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