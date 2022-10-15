<?php

namespace App\Http\Controllers\frontend;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function add_product(Request $request)
    {
        $product_id = $request->input('product_id');
        $product_qty = $request->input('product_qty');

        if (Auth::check()) {

            $prod_check = Product::where('id', $product_id)->exists();

            if ($prod_check) {

                if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first()) {

                    return response()->json(['status' => $prod_check->name . "Already Added to cart"]);
                }
                else {
                    $cartitem = new Cart();
                    $cartitem->product_id = $product_id;
                    $cartitem->user_id = Auth::id();
                    $cartitem->product_quantity = $product_qty;
                    $cartitem->save();
                    return response()->json(['status' => $prod_check->name . "Added to cart"]);
                }
            }
        }
        else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function view_cart()
    {
        $cartitems = Cart::where('user_id' , Auth::id())->get();
        return view('frontend.cart', compact('cartitems'));
    }

    public function update_cart(Request $request)
    {
        $prod_id = $request->input('product_id');
        $prod_qty = $request->input('product_quantity');
        if (Auth::check()) {
            if (Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->first();
                $cart->product_quantity = $prod_qty;
                $cart->update();
                return response()->json(['status' => 'Quantity Updated Successfully']);
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function delete_product(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('product_id');
            if (Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $cartitem = Cart::where('product_id', $prod_id)->where('user_id', Auth::id())->first();
                $cartitem->delete();
                return response()->json(['status' => 'Product Deleted Successfully']);
            }
        } else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }

    public function cart_count()
    {
        $cart_count = Cart::where('user_id', Auth::id())->count();
        return response()->json(['count' => $cart_count]);
    }
}
