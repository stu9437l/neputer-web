<?php

namespace Neputer\Services;

use Illuminate\Http\Request;
use Neputer\Entities\Business;
use Neputer\Entities\Package;
use Neputer\Entities\PackageGallery;
use Neputer\Entities\PackageHotel;
use Neputer\Entities\PackageInquiry;
use Neputer\Entities\PackageItinerary;
use Neputer\Entities\PackageSearchTag;
use Neputer\Entities\PackageTransportation;


/**
 * Class PackageService
 * @package Neputer\Services
 */
class PackageService extends BaseService
{
    /**
     * The package instance
     *
     * @var $model
     */
    protected $model;
    protected $packageTransportation;
    protected $packageHotel;
    protected $packageItinerary;
    protected $business;


    /**
     * PackageService constructor.
     * @param Package $package
     */
    public function __construct(
        Package $package,
        PackageTransportation $packageTransportation,
        PackageHotel $packageHotel,
        PackageItinerary $packageItinerary
    )
    {
        $this->model = $package;
        $this->packageHotel = $packageHotel;
        $this->packageItinerary = $packageItinerary;
        $this->packageTransportation = $packageTransportation;
    }

    /**
     * normal data fetching
     * @return mixed
     */

    public function indexPackage()
    {

    }

    public function searchResults(Request $request)
    {
        $records = Package::select('packages.id','packages.created_at', 'packages.title', 'packages.slug','available_seat','min_seat_available','max_seat_available',
            'price', 'packages.description', 'packages.status','package_type')
            ->join('businesses','businesses.id','=','packages.business_id')
            ->byUser()
            ->orderBy('created_at','desc')
            ->get();
        return $records;
    }
    public function store(array $data)
    {

        $row= ([
            'title' => $data['title'],
            'slug' => str_slug($data['title']),
            'duration' => $data['duration'],
            'location' => $data['location'],
            'available_seat' => $data['available_seat'],
            'min_seat_available' => $data['min_seat_available'],
            'max_seat_available' => $data['max_seat_available'],
            'business_id' => $data['business_id'],
            'price' => $data['price'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
        $row_create = $this->model->create($row);

        return $row_create;



    }

    public function show($id)
    {
        $this->idExist($id);
        $records = $this->model->select('packages.*','destinations.title as destination','durations.title as duration','grades.title as grade','activities.title as activity',
            'businesses.business_name as business','businesses.user_id')
            ->leftJoin('destinations','destinations.id','=','packages.destination_id')
            ->leftJoin('durations','durations.id','=','packages.duration_id')
            ->leftJoin('grades','grades.id','=','packages.grade_id')
            ->leftJoin('activities','activities.id','=','packages.activity_id')
            ->leftJoin('businesses','businesses.id','=','packages.business_id')
            ->where('packages.id',$id)
            ->first();
        return $records;
//        return $data['row'] = $this->model->find($id);
    }

    public function showHotel($id)
    {
        $this->idExist($id);
        return $data['rowHotel'] = $this->packageHotel->where('package_id', '=', $id)->get();
    }

    public function showTransport($id)
    {
        $this->idExist($id);
        return $data['rowTransport'] = $this->packageTransportation->where('package_id', '=', $id)->get();
    }

    public function showBusiness($id)
    {
        $this->idExist($id);
        return $data['rowBusiness'] = Business::select('businesses.*')
            ->leftJoin('packages','packages.business_id','=','businesses.id')
            ->where('packages.id', '=', $id)->get();
    }

    public function showSearchTag($id)
    {
        $this->idExist($id);
        return $data['tag'] = PackageSearchTag::select('tag','package_id','id')
            ->where('package_id', '=', $id)->pluck('tag','id')->implode(',');
    }

    public function getGallery($id)
    {
        $this->idExist($id);
        return  PackageGallery::select('image','alt_text','id','package_id')
            ->where('package_id', '=', $id)->get();
    }

    public function idExist($id)
    {
        return $this->model::findOrFail($id);
    }

    public function createPackageHotel(Request $request,$row)
    {
        $package_id = $row->id;
        $hotel_names = $request->get('hotel_name');
        $transport_names = $request->get('transport_name');
        if (! is_null($hotel_names)){
            foreach ($hotel_names as $key => $name){
                $packageHotel = PackageHotel::create([
                    'package_id' => $package_id,
                    'name' => $name,
                    'kilometer' => $request->get('kilometer')[$key],
                    'price' => $request->get('hotel_price')[$key],
                ]);
            }
        }
       if (! is_null($transport_names)){
           foreach ($transport_names as $key => $name){
               $packageHotel = PackageTransportation::create([
                   'package_id' => $package_id,
                   'name' => $name,
                   'price' => $request->get('transport_price')[$key],
               ]);
           }
       }

    }

    public function updatePackage(Request $request)
    {
//        dd($request->all());
        $hotel_name = $request->get('hotel_name');
        $transport_name = $request->get('transport_name');
        if($request->get('hotel_name')) {
            $arr_diff_hotel = array_diff_key($request->get('hotel_name'),  ($request->has('hotel_id')) ? $request->get('hotel_id') : []);

        }
//        dd($request->all(), $arr_diff_hotel);
        if($request->get('transport_name') ) {

            $arr_diff_transport = array_diff_key($request->get('transport_name'),  ($request->has('transport_id'))  ? $request->get('transport_id') : []);
        }
//            dd($arr_diff_hotel,$arr_diff_transport);
//
        if($request->has('hotel_name') && $request->has('id'))
        {

            foreach ($hotel_name as $key => $main)
            {

//                    $rank = $this->model->select('rank')->orderBy('rank', 'desc')->first();


                    if(isset($arr_diff_hotel[$key]))
                    {
//                        dd('pass1');
                        $data['row'] = $this->packageHotel->create([
                            'name' => ($this->packageHotel->count() == 0)?$main:$arr_diff_hotel[$key],
                            'package_id' => $request->get('id'),
                            'price' => $request->get('hotel_price')[$key],
                            'kilometer' => $request->get('kilometer')[$key],
                            'website' => $request->get('website')[$key],

                        ]);

                    }else{

                        $data['row'] = $this->packageHotel->find($request->get('hotel_id')[$key]);

//                            dd($request->get('hotel_id')[$key],$data['row']);
                           $data['row']->update([
                               'name' => $hotel_name[$key],
                               'package_id' => $request->get('id'),
                               'price' => $request->get('hotel_price')[$key],
                               'kilometer' => $request->get('kilometer')[$key],
                               'website' => $request->get('website')[$key],
//                            'rank' => $rank == null ? 1 : $rank['rank'] + 1,
                           ]);
                       }
                $processed_ids[] = $data['row']->id;

            }


            $to_remove_rows = $this->packageHotel
                ->where('package_id', $request->get('id'))
                ->whereNotIn('id', $processed_ids)
                ->get();
            foreach ($to_remove_rows as $remove_row)
            {
                $remove_row->delete();
            }

        }
        else{

            if($this->packageHotel->count())
            {

                $rows = $this->packageHotel->where('package_id', $request->get('id'))->get();
                foreach ($rows as $row)
                {
                    $row->delete();
                }

            }
        }

        if($request->has('transport_name') && $request->has('id'))
        {
            foreach ($transport_name as $key => $main)
            {


                    if(isset($arr_diff_transport[$key]))
                    {

                        $data['row'] = $this->packageTransportation->create([
                            'name' => ($this->packageTransportation->count() == 0)?$main:$arr_diff_transport[$key],
                            'package_id' => $request->get('id'),
                            'price' => $request->get('transport_price')[$key],


                        ]);

                    }else{

                        $data['row'] = $this->packageTransportation->find($request->get('transport_id')[$key]);
                        $data['row']->update([
                            'name' => $transport_name[$key],
                            'package_id' => $request->get('id'),
                            'price' => $request->get('transport_price')[$key],

//                            'rank' => $rank == null ? 1 : $rank['rank'] + 1,
                        ]);
                    }



                $processed_ids[] = $data['row']->id;

            }


            $to_remove_rows = $this->packageTransportation
                ->where('package_id', $request->get('id'))
                ->whereNotIn('id', $processed_ids)
                ->get();
            foreach ($to_remove_rows as $remove_row)
            {
                $remove_row->delete();
            }

        }
        else{

            if($this->packageTransportation->count())
            {

                $rows = $this->packageTransportation->where('package_id', $request->get('id'))->get();
                foreach ($rows as $row)
                {
                    $row->delete();
                }

            }
        }


    }

    public function storeItinerary(Request $request)
    {
        $itinerary_title = $request->get('itinerary_title');

        if($request->get('itinerary_title')) {
            $arr_diff_itinerary = array_diff_key($request->get('itinerary_title'),  ($request->has('itinerary_id')) ? $request->get('itinerary_id') : []);

        }


        if($request->has('itinerary_title') && $request->has('id'))
        {

            foreach ($itinerary_title as $key => $main)
            {

                if(isset($arr_diff_itinerary[$key]))
                {
                    $data['row'] = $this->packageItinerary->create([
                        'title' => ($this->packageItinerary->count() == 0)?$main:$arr_diff_itinerary[$key],
                        'sub_title' => $request->get('itinerary_sub_title')[$key],
                        'package_id' => $request->get('id'),
                        'details' => $request->get('itinerary_details')[$key],

                    ]);

                }else{

                    $data['row'] = $this->packageItinerary->find($request->get('itinerary_id')[$key]);
                    $data['row']->update([
                        'title' => $itinerary_title[$key],
                        'sub_title' => $request->get('itinerary_sub_title')[$key],
                        'package_id' => $request->get('id'),
                        'details' => $request->get('itinerary_details')[$key],

                    ]);
                }
                $processed_ids[] = $data['row']->id;

            }


            $to_remove_rows = $this->packageItinerary
                ->where('package_id', $request->get('id'))
                ->whereNotIn('id', $processed_ids)
                ->get();
            foreach ($to_remove_rows as $remove_row)
            {
                $remove_row->delete();
            }

        }
        else{

            if($this->packageItinerary->count())
            {

                $rows = $this->packageItinerary->where('package_id', $request->get('id'))->get();
                foreach ($rows as $row)
                {
                    $row->delete();
                }

            }
        }
    }

    public function getDetailsFront($slug)
    {
        $records = $this->model->select('packages.*','destinations.title as destination','views_count','durations.title as duration','avg_star','grades.title as grade','activities.title as activity')
            ->leftJoin('destinations','destinations.id','=','packages.destination_id')
            ->leftJoin('durations','durations.id','=','packages.duration_id')
            ->leftJoin('grades','grades.id','=','packages.grade_id')
            ->leftJoin('activities','activities.id','=','packages.activity_id')
            ->where('packages.slug',$slug)
            ->first();
        return $records;
    }

    public function getInquiry($package_id)
    {
        $records = PackageInquiry::where('package_id',$package_id)->orderBy('id','desc')->get();

        return $records;

    }

    public function getInquiryShow($package_id,$id)
    {
        $records = PackageInquiry::select('package_inquiry.id','name','package_inquiry.email','contact','package_id','message','package_inquiry.status','country')
            ->join('packages','packages.id', '=','package_inquiry.package_id')
            ->find($id);

        return $records;



    }

    public function pluckPackage()
    {
        return $this->model->pluck('title','id');
    }

    public function bookingList($package_id)
    {
        $records = $this->model->select('booking_packages.first_name','last_name','booking_packages.email','booking_packages.phone',
            'packages.title as package_name','booking_packages.package_id','booking_packages.id as id','booking_packages.created_at')
            ->join('booking_packages','booking_packages.package_id','=','packages.id')
            ->where('package_id',$package_id)
            ->get();

        return $records;
    }

    public function showBooking($package_id,$booking_id)
    {
        $records = $this->model->select('packages.title as package','packages.image','booking_packages.first_name','last_name','booking_packages.email','booking_packages.phone','booking_packages.package_id','booking_packages.id as id',
            'booking_packages.dob','booking_packages.status','booking_packages.country','booking_packages.passport_no','booking_packages.passport_expire',
            'booking_packages.mailing_email','booking_packages.no_of_people','booking_packages.arrival_date','booking_packages.flight_name',
            'booking_packages.airport_pickup','booking_packages.departure_date','payment_proof','booking_packages.find_us','booking_packages.additional_info')
            ->join('booking_packages','booking_packages.package_id','=','packages.id')
            ->where('booking_packages.package_id',$package_id)
            ->where('booking_packages.id',$booking_id)
            ->first();

        return $records;
    }

    public function getHotelDetails($package_id)
    {
        $records = PackageHotel::select('package_hotel.name as hotel_name','kilometer','website','id')
            ->where('package_id',$package_id)
            ->get();
        return $records;

        }

    public function booking(Request $request)
    {
        $records = $this->model->select('booking_packages.first_name', 'last_name', 'booking_packages.email', 'booking_packages.phone',
            'packages.title as package_name', 'booking_packages.package_id', 'booking_packages.id as id', 'booking_packages.created_at','booking_packages.status')
            ->join('booking_packages', 'booking_packages.package_id', '=', 'packages.id')
            ->where(function ($query) use ($request) {
                if ($request->get('query')) {
                    $query->where('booking_packages.status', 0);
                }
            })
            ->orderBy('booking_packages.created_at', 'desc')
            ->byUser()
            ->get();
        return $records;
    }



    }
