@extends('frontend.layouts.master')

@section('title','Client Review')
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
    'page'=>'Client Reviews',
    'title'=>'Client Reviews',
    'banner'=> 'our_client_banner'
])

<!--End Breadcrumb-->
<!--Start reviews-->
 @include('frontend.client-review.includes.review-section')
<!--End reviews-->

<!--Start reviews-->
{{--@include('frontend.client-review.includes.client-review')--}}
<!--End reviews-->

<!--Start reviews-->
{{--@include('frontend.client-review.includes.video-review')--}}
<!--End text reviews-->


<!--Start reviews-->
{{--<section class="reviews-block bg-gradient5 pad-tb">--}}
{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-8">--}}
{{--                <div class="common-heading ptag">--}}
{{--                    <span>Reviews</span>--}}
{{--                    <h2>External Review Link</h2>--}}
{{--                    <p class="mb30">Check our customers success stories.</p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-lg-12">--}}
{{--                <div class="review-ref mt60">--}}
{{--                    <div class="review-title-ref">--}}
{{--                        <h4>Read More Reviews</h4>--}}
{{--                        <p>Read our reviews from all over world.</p>--}}
{{--                    </div>--}}
{{--                    <div class="review-icons">--}}
{{--                        <a href="#" target="blank"><img src="images/about/reviews-icon-1.png" alt="review" class="img-fluid"></a>--}}
{{--                        <a href="#" target="blank"><img src="images/about/reviews-icon-2.png" alt="review" class="img-fluid"></a>--}}
{{--                        <a href="#" target="blank"><img src="images/about/reviews-icon-3.png" alt="review" class="img-fluid"></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<!--End text reviews-->
@endsection