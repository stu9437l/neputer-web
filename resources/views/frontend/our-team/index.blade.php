@extends('frontend.layouts.master')

@section('content')

<div class="popup-modal1">
    <div class="modal" id="menu-popup">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="common-heading">
                        <h4 class="mt0 mb0">Write a Message</h4>
                    </div>
                    <button type="button" class="closes" data-dismiss="modal">&times;</button></div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="form-block fdgn2 mt10 mb10">
                        <form action="#" method="post" name="feedback-form">
                            <div class="fieldsets row">
                                <div class="col-md-12"><input type="text" placeholder="Full Name" name="name"></div>
                                <div class="col-md-12"><input type="email" placeholder="Email Address" name="email"></div>
                                <div class="col-md-12"><input type="number" placeholder="Contact Number" name="phone"></div>
                                <div class="col-md-12"><input type="text" placeholder="Subject" name="subject"></div>
                                <div class="col-md-12"><textarea placeholder="Message" name="message"></textarea></div>
                            </div>
                            <div class="fieldsets mt20 pb20">
                                <button type="submit" name="submit" class="lnk btn-main bg-btn" data-dismiss="modal">Submit <i class="fas fa-chevron-right fa-icon"></i><span class="circle"></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--Mobile contact-->

<!--End Header -->
<!--Breadcrumb Area-->
 @include('frontend.layouts.breadcrumb',[
    'page'=>'About',
    'title'=>'Our leaders',
     'banner'=> 'our_team_image'
])
<!--End Breadcrumb Area-->
<!--Start Team Leaders-->
{{-- @include('frontend.our-team.includes.team-leader')--}}
<!--End Team Leaders-->

<!--Start Team Members-->
@include('frontend.our-team.includes.team-member')
<!--End Team Members-->
@endsection