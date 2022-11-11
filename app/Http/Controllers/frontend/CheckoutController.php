<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        // $old_cartItems = Cart::where('user_id', Auth::id())->get();
        // foreach ($old_cartItems as $item) {
        //     if (Product::where('id', $item->product_id)->where('quantity', '>=', $item->product_quantity)->exists()) {
        //         $remove_item = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
        //         $remove_item->delete();
        //     }
        // }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('Frontend.checkout', compact('cartItems'));
    }
    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->first_name = $request->input('first_name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');

        $total = 0;
        $cartItems_total = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems_total as $prod) {

            $total += $prod->product->selling_price * $prod->product_quantity;
        }
        $order->total_price = $total;
        $order->save();

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' =>    $item->product_quantity,
                'price' => $item->product->selling_price,

            ]);
            $prod = Product::where('id', $item->product_id)->first();
            $prod->quantity = $prod->quantity - $item->quantity;
            $prod->update();
        }
        if (Auth::user()->address == null) {
            $user = User::where('id', Auth::id())->first();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->update();
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('/')->with('status', 'Order Placed Successfully');
    }
    public function RazorPayCheck(Request $request)
    {
        $cartItems = Cart::where('user_id', Auth::id())->get();
        $total_price = 0;
        foreach ($cartItems as $item) {
            $total_price += $item->product->selling_price * $item->quantity;
        }
        $first_name = $request->input('first_name');
        $last_name = $request->input('last_name');
        $email = $request->input('email');
        $phone = $request->input('phone');
        $city = $request->input('city');

        return response()->json([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email,
            'phone' => $phone,
            'city' => $city,
            'total_price' => $total_price,
        ]);
    }
}
