<?php

namespace App\Http\Controllers\Shop;

use App\Mail\OrderInfo;
use App\Model\Order;
use App\Model\OrderCart;
use App\Model\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class OrderController extends BaseController
{
    /**
     * @param Request $request
     */
    public function index(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'address' => 'required',
        ]);

        try {
            $data = [];
            foreach (Cart::content() as $key => $item) {
                $product = Product::find($item->id);
                if ($product) {
                    $data[$key] = [
                        'product_id' => $item->id,
                        'product_name' => $item->name,
                        'qty' => $item->qty, //qty of cart item
                        'image' => $item->options->image,
                        'weight' => $item->options->weight ?? 0,
                        'unit_price' => $item->price,
                        'total_price' => $item->total,
                    ];
                }
            }
            if ($data) {
                $order = Order::create($request->all());
                foreach ($data as $value) {
                    OrderCart::create([
                        'order_id' => $order->id,
                        'product_id' => $value['product_id'],
                        'product_name' => $value['product_name'],
                        'qty' => $value['qty'], //qty of cart item
                        'weight' => $value['weight'],
                        'unit_price' => $value['unit_price'],
                        'total_price' => $value['total_price']
                    ]);
                }

                $info = [
                    'first_name' => $request->get('first_name'),
                    'last_name' => $request->get('last_name'),
                    'email' => $request->get('email'),
                    'phone' => $request->get('phone'),
                    'address' => $request->get('address'),
                    'optional_address' => $request->get('optional_address')
                ];
                $totalOrderPrice = Cart::total();
                Mail::to($info['email'])->send(new OrderInfo($info, $data, $totalOrderPrice));
                session()->flash('success-message', 'Your order has been placed successfully!! Thank you for doing business with us.');
                session()->forget('cart');
                return redirect()->route('cart');
//                return redirect()->back()->with('success-message', 'Your order has been placed successfully!! Thank you for doing business with us.');
            }

        } catch (\Exception $exception) {
            return back()->with('error-message', 'Opps! something went wrong. Please try again.');
        }

    }
}
