@extends('admin.include.layout')

@section('title', 'Contact::Show')

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
                                <td>{{ $data['contact']->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data['contact']->email }}</td>
                            </tr>
                            <tr>
                                <th>Subject</th>
                                <td>{{ $data['contact']->subject }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{{ $data['contact']->message }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><label class="label label-{{ $data['contact']->status == 1 ? 'success' : 'warning'}}">{{ $data['contact']->status == 1 ? 'Seen' : 'Unseen' }}</label> </td>
                            </tr>
                            <tr>
                                <th>Created At</th>
                                <td>{{ $data['contact']->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $data['contact']->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="hr hr8 hr-double hr-dotted"></div>
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
