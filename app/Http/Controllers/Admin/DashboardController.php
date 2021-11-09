<?php

namespace App\Http\Controllers\Admin;


use App\Model\Category;
use App\Model\Contact;
use App\Model\Order;
use App\Model\Pages;
use App\Model\Product;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class DashboardController extends BaseController
{

    protected $view_path = 'admin.dashboard';
    protected $base_route = 'admin.dashboard';
    protected $panel = 'Dashboard';
    protected $paginate = 10;

    public function index(Request $request)
    {
        $data = [];
        $data['users'] = User::get();
        $data['activeUsers'] = $data['users']->where('status', 1)->count();
        $data['inActiveUsers'] = $data['users']->where('status', 0)->count();
        $data['categories'] = Category::get();
        $data['activeCategory'] = $data['categories']->where('status', 1)->count();
        $data['inActiveCategory'] = $data['categories']->where('status', 0)->count();
        $data['products'] = Product::get();
        $data['activeProduct'] = $data['products']->where('status', 1)->count();
        $data['inActiveProduct'] = $data['products']->where('status', 0)->count();
        $data['pages'] = Pages::get();
        $data['activePages'] = $data['pages']->where('status', 1)->count();
        $data['inActivePages'] = $data['pages']->where('status', 0)->count();
        $data['orders'] = Order::get();
        $data['seenOrders'] = $data['orders']->where('status', 1)->count();
        $data['unSeenOrders'] = $data['orders']->where('status', 0)->count();
        $data['orderList'] = $this->getOrderList($request);
        $data['contact'] = Contact::get();
        $data['seenContact'] = $data['contact']->where('status', 1)->count();
        $data['unSeenContact'] = $data['contact']->where('status', 0)->count();
        $data['contactList'] = $this->getContactList($request);

        $perPage = $this->paginate;

        $data['orderList'] = self::customPaginator(collect($data['orderList']->toArray()),
            $perPage,
            [
                'path' => url('admin/dashboard'),
                'pageName' => 'order_list'
            ])->appends($request->all());

        $data['contactList'] = self::customPaginator(collect($data['contactList']->toArray()),
            $perPage,
            [
                'path' => url('admin/dashboard'),
                'pageName' => 'contact_list'
            ])->appends($request->all());


        return view(parent::loadDefaultViewPath($this->view_path . '.index'), compact('data'));
    }

    protected function getOrderList(Request $request)
    {
        $results = Order::select(\DB::raw('CONCAT(first_name, " ", last_name) AS name'), 'id', 'email', 'phone', 'address', 'created_at', 'updated_at', 'status', 'delivery_status')
            ->where(function ($query) use ($request) {
                if ($request->has('filter_name') && $request->get('filter_name')) {
                    $query->where('first_name', 'like', '%' . $request->get('filter_name') . '%');
                }

                if ($request->has('filter_email') && $request->get('filter_email')) {
                    $query->where('email', 'like', '%' . $request->get('filter_email') . '%');
                }

                if ($request->has('filter_phone') && $request->get('filter_phone')) {
                    $query->where('phone', 'like', '%' . $request->get('filter_phone') . '%');
                }

                if ($request->has('filter_address') && $request->get('filter_address')) {
                    $query->where('email', 'like', '%' . $request->get('filter_address') . '%');
                }

                if ($request->has('filter_created_at') && $request->get('filter_created_at')) {
                    $query->where('created_at', 'like', $request->get('filter_created_at') . '%');
                }

                if ($request->has('filter_updated_at') && $request->get('filter_updated_at')) {
                    $query->where('updated_at', 'like', $request->get('filter_updated_at') . '%');
                }

                if ($today = $request->get('filter_today')) {
                    $query->whereDate('created_at', Carbon::today());
                }

                if ($yesterday = $request->get('filter_yesterday')) {
                    $query->whereDate('created_at', Carbon::yesterday());
                }

                if ($request->has('filter_status') && $request->get('filter_status') && $request->get('filter_status') !== 'all') {
                    $query->where('status', $request->get('filter_status') == 'seen' ? 1 : 0);
                }

                if ($deliveryStatus = $request->get('filter_delivery_status')) {
                    $query->where('delivery_status', $deliveryStatus);
                }

            })
            ->orderBy('id', 'DESC')
            ->get();

        return $results;
    }

    public function getContactList(Request $request)
    {
        $result = Contact::select('id', 'name', 'email', 'created_at', 'updated_at', 'status')
            ->where(function ($query) use ($request) {

                if ($request->has('filter_contact_name') && $request->get('filter_contact_name')) {
                    $query->where('name', 'like', '%' . $request->get('filter_contact_name') . '%');
                }

                if ($request->has('filter_contact_email') && $request->get('filter_contact_email')) {
                    $query->where('email', 'like', '%' . $request->get('filter_contact_email') . '%');
                }

                if ($request->has('filter_contact_created_at') && $request->get('filter_contact_created_at')) {
                    $query->where('created_at', 'like', $request->get('filter_contact_created_at') . '%');
                }

                if ($request->has('filter_contact_updated_at') && $request->get('filter_contact_updated_at')) {
                    $query->where('updated_at', 'like', $request->get('filter_contact_updated_at') . '%');
                }

                if ($request->has('filter_contact_status') && $request->get('filter_contact_status') && $request->get('filter_contact_status') !== 'all') {
                    $query->where('status', $request->get('filter_contact_status') == 'active' ? 1 : 0);
                }

                if ($today = $request->get('filter_contact_today')) {
                    $query->whereDate('created_at', Carbon::today());
                }

                if ($yesterday = $request->get('filter_contact_yesterday')) {
                    $query->whereDate('created_at', Carbon::yesterday());
                }

            })
            ->orderBy('id', 'DESC')
            ->get();

        return $result;
    }

    public function customPaginator(Collection $items, int $perPage, array $options = [])
    {
        $total = $items->count();
        $currentPage = request($options['pageName'], 1);
        $offset = ($currentPage * $perPage) - $perPage;
        $itemsToShow = array_slice($items->toArray(), $offset, $perPage);
        return new LengthAwarePaginator($itemsToShow, $total, $perPage, null, $options);
    }

    public function unAuthorized()
    {
        return view(parent::loadDefaultViewPath('admin.dashboard.un_authorized'));
    }

    public function errors()
    {
        return view('error.500');
    }

}
