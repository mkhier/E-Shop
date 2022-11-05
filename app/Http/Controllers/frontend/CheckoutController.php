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
        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (Product::where('id', $item->product_id)->where('quantity', '>=', $item->product_quantity)->exists()) {
                $remove_item = Cart::where('user_id', Auth::id())->where('product_id', $item->product_id)->first();
                $remove_item->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();
        return view('Frontend.checkout', compact('cartItems'));
    }
    public function place_order(Request $request)
    {
        $order = new Order();
        $order->user_id = Auth::id();
        $order->name = $request->input('name');
        $order->last_name = $request->input('last_name');
        $order->email = $request->input('email');
        $order->phone = $request->input('phone');
        $order->address = $request->input('address');
        $order->city = $request->input('city');

        $total = 0;
        $cartItems_total = Cart::where('user_id',Auth::id())->get();
        foreach($cartItems_total as $prod){

            $total += $prod->product->selling_price;
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
        }
        if(Auth::user()->address == null)
        {
            $user = User::where('id',Auth::id())->first();
            $user->name = $request->input('name');
            $user->last_name = $request->input('last_name');
            $user->email = $request->input('email');
            $user->phone = $request->input('phone');
            $user->address = $request->input('address');
            $user->city = $request->input('city');
            $user->update();
        }
        $cartItems = Cart::where('user_id',Auth::id())->get();
        Cart::destroy($cartItems);
        return redirect('/')->with('status' ,'Order Placed Successfully');
    }
}
