@extends('admin.include.layout')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'Edit'
       ])

        <div class="page-content">

            @include('admin.include.page-header', [
                'page' => 'Edit',
                'title' => ''
            ])
            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    @include('admin.include.display_flash_data')

                    @include($view_path.'.edit.form')

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_scripts')
    @yield('page_scripts')
    @include('admin.include.jquery_sortable')
@endsection
