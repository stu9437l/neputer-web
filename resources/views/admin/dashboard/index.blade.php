@extends('admin.include.layout')

@section('title', 'Dashboard')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route,
            /*'panel' => 'Dashboard',*/
            'page' => 'Dashboard'
        ])


        <div class="page-content">
            @include('admin.include.page-header', [
             'page' => '',
             'title' => 'Dashboard'
            ])


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5>
                                        <a href="{{ route('admin.users.index') }}">
                                            <i class="icon-user"></i>
                                            Users</a>
                                    </h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Total Users: {{ $data['users']->count() }}
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid2">
                                                Active Users:
                                                <h4 class="bigger">{{ $data['activeUsers'] }}</h4>
                                            </div>

                                            <div class="grid2">
                                                Inactive Users:
                                                <h4 class="bigger">{{ $data['inActiveUsers'] }}</h4>
                                            </div>
                                        </div>
                                    </div><!-- /widget-main -->
                                </div><!-- /widget-body -->
                            </div><!-- /widget-box -->
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5>
                                        <a href="{{ route('admin.pages.index') }}">
                                            <i class="icon-paper-clip"></i>
                                            Pages
                                        </a>
                                    </h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Total Pages: {{ $data['users']->count() }}
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid2">
                                                Active Pages:
                                                <h4 class="bigger">{{ $data['activePages'] }}</h4>
                                            </div>

                                            <div class="grid2">
                                                Inactive Pages:
                                                <h4 class="bigger">{{ $data['inActivePages'] }}</h4>
                                            </div>
                                        </div>
                                    </div><!-- /widget-main -->
                                </div><!-- /widget-body -->
                            </div><!-- /widget-box -->
                        </div>
                        <div class="col-sm-4">
                            <div class="widget-box">
                                <div class="widget-header widget-header-flat widget-header-small">
                                    <h5>
                                        <a href="{{ route('admin.contact.index') }}">
                                            <i class="icon-envelope"></i>
                                            Contacts
                                        </a>
                                    </h5>
                                </div>
                                <div class="widget-body">
                                    <div class="widget-main">
                                        Total Contacts: {{ $data['contact']->count() }}
                                        <div class="hr hr8 hr-double"></div>

                                        <div class="clearfix">
                                            <div class="grid2">
                                                Seen Contacts:
                                                <h4 class="bigger">{{ $data['seenContact'] }}</h4>
                                            </div>

                                            <div class="grid2">
                                                Unseen Contacts:
                                                <h4 class="bigger">{{ $data['unSeenContact'] }}</h4>
                                            </div>
                                        </div>
                                    </div><!-- /widget-main -->
                                </div><!-- /widget-body -->
                            </div><!-- /widget-box -->
                        </div>
                    </div><!-- /row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <h3>Contact List</h3>
                            @include('admin.dashboard.includes.contact')
                            <div class="space-6"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection

@section('js_libraries')


@endsection

@section('js_scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $('.today').on('click', function () {
                var url = '{{ route('admin.dashboard') }}';
                window.location = url + "?filter_today=today";
            });

            $('.yesterday').on('click', function () {
                var url = '{{ route('admin.dashboard') }}';
                window.location = url + "?filter_yesterday=yesterday";
            });

            $('.contact_today').on('click', function () {
                var url = '{{ route('admin.dashboard') }}';
                window.location = url + "?filter_contact_today=today";
            });

            $('.contact_yesterday').on('click', function () {
                var url = '{{ route('admin.dashboard') }}';
                window.location = url + "?filter_contact_yesterday=yesterday";
            });
        });
    </script>

@endsection
