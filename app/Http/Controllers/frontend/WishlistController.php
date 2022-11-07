<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->get();
        return view('Frontend.wishlist',compact('wishlist'));
    }
    public function add(Request $request)
    {
        if(Auth::check())
        {
            $prod_id = $request->input('product_id');
            $prod_check = Product::find($prod_id);
            if($prod_check)
            {
                $wish = new Wishlist();
                $wish->product_id = $prod_id;
                $wish->user_id = Auth::id();
                $wish->save();
                return response()->json(['status' => $prod_check->name . " Added To Wishlist"]);
            }
            else{
                return response()->json(['status' => "Product Does not Exist"]);
            }
        }
        else
        {
            return response()->json(['status' => "Login To Continue"]);
        }
    }
    public function delete(Request $request)
    {
        if (Auth::check()) {
            $prod_id = $request->input('product_id');
            if (Wishlist::where('product_id', $prod_id)->where('user_id', Auth::id())->exists()) {
                $wishlist = Wishlist::where('product_id', $prod_id)->where('user_id', Auth::id())->first();
                $wishlist->delete();
                return response()->json(['status' => 'item Deleted Successfully']);
            }
        }
        else {
            return response()->json(['status' => 'Login to Continue']);
        }
    }
    public function wishlist_count()
    {
        $wishlist = Wishlist::where('user_id',Auth::id())->count();
        return response()->json(['count' => $wishlist]);
    }
}
