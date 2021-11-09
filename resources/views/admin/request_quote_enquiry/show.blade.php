@extends('admin.include.layout')

@section('title', 'Career::Show')

@section('css')
    <style>
        li {
            list-style: none;
        }
    </style>
@endsection

@section('content')

    <div class="main-content">
        @include('admin.include.breadcrumb', [
           'base_route' => $base_route.'.index',
           'page' => 'View'
       ])

        <div class="page-content">
            <div class="page-header">
                <h1>
                    Order Manager
                    <small>
                        <i class="icon-double-angle-right"></i>
                        View
                    </small>
                    <a href="{{ url()->previous() }}" class="btn btn-xs btn-success pull-right">
                        <i class="icon-backward"></i> Back</a>
                </h1>
            </div>
            @include('admin.include.display_flash_data')
            <div class="row-fluid">
                <div class="span10 offset1">
                    <div class="row-fluid">
                        <table class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>label</th>
                                <th class="hidden-phone">Information</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $data['request_quote']->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data['request_quote']->email }}</td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td>{{ $data['request_quote']->service }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{{ $data['request_quote']->message }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <label class="label label-{{ $data['request_quote']->status == 1 ? 'success' : 'warning'}}">{{ $data['request_quote']->status == 1 ? 'Seen' : 'Unseen' }}
                                    </label>
                                    <a href="{{ route('admin.request_quote.unseen',$data['request_quote']->id) }}"> Make Unseen
                                    </a>
                                </td>
                            </tr>

                            <tr>
                                <th>Created At</th>
                                <td>{{ $data['request_quote']->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $data['request_quote']->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="hr hr8 hr-double hr-dotted"></div>
                    <div class="row">
                        <a href="{{ route('request_quote.getMail',$data['request_quote']->id) }}" class="btn btn-primary">Send Mail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js_scripts')
    <script src="{{ asset('assets/panel/js/jquery.validate.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            $('#order-form').validate({
                rules: {
                    delivery_status: "required",
                },
                errorElement: 'div',
                errorLabelContainer: '.errorTxt'
            });
        });
    </script>
@endsection
