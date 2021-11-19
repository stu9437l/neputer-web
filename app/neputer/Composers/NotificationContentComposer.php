<?php


namespace Neputer\Composers;


use Illuminate\View\View;
use Neputer\Entities\BookingPackage;
use Neputer\Entities\PackageInquiry;
use Neputer\Entities\PackageReview;

class NotificationContentComposer
{



    public function compose(View $view)
    {
        $view->with('review_count', $this->getReviewCount());
        $view->with('order_count', $this->getOrderCount());
        $view->with('inquiry_count', $this->getInquiryCount());


    }

    public function getReviewCount()
    {
        $review = PackageReview::
            leftJoin('packages','packages.id','=','package_reviews.package_id')
            ->leftJoin('businesses','businesses.id','=','packages.business_id')
            -> where('package_reviews.status','pending')
            ->byUser()
            ->count();
//        dd($review);
      return $review;
    }

    public function getOrderCount()
    {
        $order = BookingPackage::leftJoin('packages','packages.id','=','booking_packages.package_id')
            ->leftJoin('businesses','businesses.id','=','packages.business_id')
            -> where('booking_packages.status',0)
            ->byUser()->count();
        return $order;
    }

    public function getInquiryCount()
    {
        $inquiry = PackageInquiry::leftJoin('packages','packages.id','=','package_inquiry.package_id')
            ->leftJoin('businesses','businesses.id','=','packages.business_id')
            -> where('package_inquiry.status',0)
            ->byUser()
            ->count();

        return $inquiry;
    }
}
