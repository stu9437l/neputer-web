@extends('admin.include.layout')

@section('content')

    <div class="main-content">

        @include('admin.include.breadcrumb', [
            'base_route' => $base_route,
            /*'panel' => 'Dashboard',*/
            'page' => 'UnAuthorized'
        ])


        <div class="page-content">
            {{--@include('admin.include.page-header', [--}}
             {{--'page' => '',--}}
             {{--'title' => 'Dashboard'--}}
            {{--])--}}


            <div class="row">
                <div class="col-xs-12">
                    <!-- PAGE CONTENT BEGINS -->

                    <div class="error-container">
                        <div class="well">
                            <h1 class="grey lighter smaller">
											<span class="blue bigger-125">
												<i class="icon-random"></i>
												500
											</span>
                                Something Went Wrong
                            </h1>

                            <hr>
                            <h3 class="lighter smaller">
                                But we are working
                                <i class="icon-wrench icon-animated-wrench bigger-125"></i>
                                on it!
                            </h3>

                            <div class="space"></div>

                            <div>
                                <h4 class="lighter smaller">Meanwhile, try one of the following:</h4>

                                <ul class="list-unstyled spaced inline bigger-110 margin-15">
                                    <li>
                                        <i class="icon-hand-right blue"></i>
                                        Read the faq
                                    </li>

                                    <li>
                                        <i class="icon-hand-right blue"></i>
                                        Give us more info on how this specific error occurred!
                                    </li>
                                </ul>
                            </div>

                            <hr>
                            <div class="space"></div>
                        </div>
                    </div>

                    <!-- PAGE CONTENT ENDS -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->

@endsection