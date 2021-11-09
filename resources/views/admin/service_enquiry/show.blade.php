@extends('admin.include.layout')

@section('title', 'Service::Show')

@push('css')
    <style>
        li {
            list-style: none;
        }
    </style>
@endpush

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
                                <td>{{ $data['service']->name }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data['service']->email }}</td>
                            </tr>
                            <tr>
                                <th>Subject</th>
                                <td>{{ $data['service']->topic }}</td>
                            </tr>
                            <tr>
                                <th>Message</th>
                                <td>{{ $data['service']->message }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>
                                    <label class="label label-{{ $data['service']->status == 1 ? 'success' : 'warning'}}">{{ $data['service']->status == 1 ? 'Seen' : 'Unseen' }}</label>
                                    <a href="{{ route('admin.service_enquiry.unseen',$data['service']->id) }}"> Make Unseen
                                    </a>
                                </td>
                            </tr>
                          @if(isset($data['service']->image))
                              <tr>
                                <th>Image</th>
                                <td><img src="{{ \App\Facades\ViewHelperFacade::getImagePath('service_enquiry',$data['service']->image) }}" alt="Career Image" height="400" width="800">  </td>
                            </tr>
                          @endisset
                            <tr>
                                <th>Created At</th>
                                <td>{{ $data['service']->created_at }}</td>
                            </tr>
                            <tr>
                                <th>Updated At</th>
                                <td>{{ $data['service']->updated_at }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="hr hr8 hr-double hr-dotted"></div>
                    <div class="row">
                        <a href="{{ route('service.getMail',$data['service']->id) }}" class="btn btn-primary">Send Mail</a>
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
