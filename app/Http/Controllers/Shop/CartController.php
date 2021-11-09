<?php

namespace App\Http\Controllers\Shop;

use App\Facades\AppHelperFacade;
use App\Model\Attributes;
use App\Model\Order;
use App\Model\Product;
use App\Model\Transaction;
use App\MyLibraries\HelperClass\AppHelper;
use App\MyLibraries\HelperClass\ViewHelper;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\Exception;
use PHPUnit\Framework\Constraint\Count;

class CartController extends BaseController
{
    private $cart_qty_count;

    //for shopping cart go to: https://github.com/Crinsane/
    public function __construct()
    {
        $this->middleware('checkout')->only('checkout');
    }

    public function sessionUnset()
    {
        Session::flush();
        return redirect()->route('home');
    }

    public function deleteCart(Request $request, $id)
    {
        // Get the product array
        $cart = Session::get('cart');
        // Unset the first index (or provide an index)
        unset($cart['default'][$id]);

        // Overwrite the product session
        Session::put('cart', $cart);
        return redirect()->back();
    }

    public function emptyCart()
    {
        Cart::destroy();
        return redirect()->back();
    }

    public function addToCart(Request $request)
    {
        $response = [];
        $response['error'] = true;
        if ($request->has('slug') && Product::Active()->where('slug', $request->get('slug'))->count() > 0) {

            $product = Product::Active()->where('slug', $request->get('slug'))->first();
            if ($request->get('attribute_id') && $request->get('weight')) {
                $attribute = Attributes::select('title')->where('id', $request->get('attribute_id'))->first();
                $attributePrices = \DB::table('product_attribute')->select('new_price')->where('product_id', $product->id)
                    ->where('attribute_id', $request->get('attribute_id'))
                    ->where('weight', $request->get('weight'))
                    ->first();
                $weight = $request->get('weight') . ' ' . $attribute->title;
            } else if ($product->attributes) {

                //if comes from product section, keep least weight and attribute title
                $attribute = Product::select('attributes.title')
                                        ->join('product_attribute', 'product_attribute.product_id', '=', 'products.id')
                                        ->join('attributes', 'attributes.id', '=', 'product_attribute.attribute_id')
                                        ->where('products.id', $product->id)
                                        ->first();

                $attributeWeight = \DB::table('product_attribute')->select('weight')->where('product_id', $product->id)->orderBy('weight', 'ASC')->first();

                if(isset($attribute) && isset($attributeWeight)){
                    $weight = $attributeWeight->weight. ' ' . $attribute->title;
                }
            }
            $cart = Cart::content();
            $cart->search(function ($cartItem, $rowId) use ($product) {

                if ($product->id == $cartItem->id) {
                    $this->cart_qty_count = $cartItem->qty;
                }

            });
            $qty = $request->has('quantity') ? $request->get('quantity') : 1;
            if (($this->cart_qty_count + $qty) <= $product->quantity) {

                $category = $product->category;
                Cart::add([
                    'id' => $product->id,
                    'name' => $product->title,
                    'qty' => $qty,
                    'price' => $attributePrices->new_price ?? $product->new_price,
                    'options' => [
                        'weight' => $weight ?? '',
                        'image' => $product->main_image,
                    ]
                ]);

                $response['error'] = false;
                $response['message'] = $product->title . ' : Successfully added to cart.';
                $response['cart_html_block'] = view('shop.includes.header_quick_cart_view')->render();


            } else {
                $response['message'] = 'This request can not be processed for now. Reached max quantity.';
            }


        } else {

            $response['message'] = 'This request can not be processed for now. Please, try later.';

        }


        return response()->json(json_encode($response));
    }

    public function cart()
    {
        $data = [];
        if (!Auth::check()) {
            return redirect()->route('shop.login');
        }
        $data['rows'] = $this->getCartData();
        return view('shop.cart.list', compact('data'));
    }

    public function updateFromCart(Request $request)
    {

        $response = [];
        $response['error'] = true;
        if ($request->has('cart_id') && $request->has('new_qty')) {

            $row = Cart::update($request->get('cart_id'), [
                'qty' => $request->get('new_qty')
            ]);

            $response['error'] = false;
            $response['message'] = 'The cart item updated successfully!!';
            $response['cart_quick_view_html'] = view('shop.includes.header_quick_cart_view')->render();
            $response['data'] = [
                'cart_count' => Cart::count() . ' ' . str_plural('Product', Cart::count() <= 1 ? 1 : 2),
                'cart_total_amount' => AppHelperFacade::getPrice(Cart::total()),
                'row_total' => AppHelperFacade::getPrice($row->total())
            ];


        } else {

            $response['message'] = 'The request can not be process for now. Please try again later.';
        }

        return response()->json($response);

    }

    public function removeFromCart(Request $request)
    {

        $response = [];
        $response['error'] = true;

        if ($request->has('cart_id')) {

            Cart::remove($request->get('cart_id'));
            $response['error'] = false;
            $response['message'] = 'The item has been removed from the cart.';

            $response['cart_quick_view_html'] = view('shop.includes.header_quick_cart_view')->render();
            $response['data'] = [
                'cart_count' => Cart::count() . ' ' . str_plural('Product', Cart::count() <= 1 ? 1 : 2),
                'cart_total_amount' => AppHelperFacade::getPrice(Cart::total())
            ];

        } else {

            $response['message'] = 'The request can not be process for now. Please try again later.';

        }

        return response()->json(json_encode($response));

    }

    public function checkout()
    {
        $data = [];
        $data['rows'] = $this->getCartData();
        if(Auth::check()){
            $data['users'] = auth()->user();
            $data['userDetails'] = $data['users']->userDetail;
        }
        return view('shop.cart.checkout', compact('data'));

    }

    public function payment(Request $request)
    {

        \Stripe\Stripe::setApiKey(AppHelperFacade::getStripeCredentials('secret_key'));

        $token = $request->get('stripeToken');
        $email = $request->get('stripeEmail');

        DB::beginTransaction();

        try {

            //save transaction
            $transaction = Transaction::create([
                'code' => $this->getTransactionCode(),
                'billing_info' => $this->getBillingData($request),
                'shipping_info' => $this->getShippingData($request),
                'user_id' => auth()->user()->id,
                'total' => AppHelperFacade::toNumber(Cart::total()),
                'payment_gateway' => 'stripe',
                'payment_token' => $token,
                'status' => 'pending'
            ]);

            foreach (Cart::content() as $item) {
                $order = Order::create([
                    'transaction_id' => $transaction->id,
                    'product_id' => $item->id,
                    'title' => $item->title,
                    'price' => $item->price,
                    'qty' => $item->qty,
//                    'total_price' => $item->total
                ]);
            }

            $customer = \Stripe\Customer::create(array(
                'email' => $email,
                'source' => $token
            ));
            $charge = \Stripe\Charge::create(array(
                'customer' => $customer->id,
                'amount' => AppHelperFacade::toNumber(Cart::total()) * 100,
                'currency' => 'usd'
            ));

            if ($charge) {
                //update product quantity

                //clear cart

                DB::commit();

                //email invoice to customer
                //redirect to customer checkout success message page
            } else {
                throw new \Exception('Payment failed for stripe.');
            }

        } catch (\Exception $exception) {
            DB::rollBack();
        }

        echo '<h1>Successfully charged ' . Cart::total() . '!</h1>';
        die();
    }

    protected function getCartData()
    {
        $data = [];
        foreach (Cart::content() as $key => $item) {

            $product = Product::find($item->id);

            if ($product) {
                $data[$key] = [
                    'id' => $item->id,
                    'name' => $item->name,
                    'weight' => $item->options->weight ?? '',
                    'qty' => $item->qty, //qty of cart item
                    'price' => $item->price,
                    'image' => $item->options->image,
                    'slug' => $product->slug,
                    'category_slug' => $product->category->slug,
                    'parent_slug' => $product->category->parent->slug,
                    'real_qty' => $product->quantity, //qty of product remaining in the database
                    'total' => $item->total
                ];
            }

        }

        return $data;
    }

    protected function getTransactionCode()
    {
        if (Transaction::count() == 0) {
            return 50050;
        } else {
            $latest = Transaction::orderBy('id', 'desc')->first();
            return $latest->code + 1;
        }
    }

    protected function getBillingData($request)
    {

        return json_encode([
            'name' => $request->billing_first_name . ' ' . $request->billing_last_name,
            'company' => $request->billing_company_name,
            'email' => $request->billing_email_address,
        ]);

    }

    protected function getShippingData($request)
    {
        return json_encode([
            'name' => $request->shipping_first_name . ' ' . $request->shipping_last_name,
            'company' => $request->shipping_company_name,
            'email' => $request->shipping_email_address,
            'address' => $request->shipping_address,
            'city' => $request->shipping_city,
            'state' => $request->shipping_state,
            'zip' => $request->shipping_postal_code,
            'country' => $request->shipping_country,
            'contact_no' => $request->shipping_telephone,
            'fax_no' => $request->shipping_fax
        ]);

    }


}
