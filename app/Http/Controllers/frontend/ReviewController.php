<?php

namespace App\Http\Controllers\frontend;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function add($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();

        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id',Auth::id())->where('product_id',$product_id)->first();
            if($review)
            {
                return view('Frontend.Reviews.edit', compact('review'));
            }
            else
            {
                $verified_purchase = Order::where('orders.user_id', Auth::id())
                ->join('order_items', 'orders.id', 'order_items.order_id')
                ->where('order_items.product_id', $product_id)->get();
            return view('Frontend.Reviews.index', compact('product', 'verified_purchase'));
            }
            
        } 
        else 
        {
            return redirect()->back()->with('status', 'The Link is Broken');
        }
    }
    public function create(Request $request)
    {
        $product_id = $request->input('product_id');
        $product = Product::where('id', $product_id)->where('status', '0')->first();
        if ($product) {
            $user_review = $request->input('user_review');
            $new_review = Review::create([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'user_review' => $user_review
            ]);
            $category_slug = $product->category->slug;
            $product_slug = $product->slug;
            if ($new_review) {
                return redirect('category/' . $category_slug . '/' . $product_slug)->with('status', 'Thank You for Writing A review');
            }
        } else {
            return redirect()->back()->with('status', 'This Link is Broken');
        }
    }
    public function edit($product_slug)
    {
        $product = Product::where('slug', $product_slug)->where('status', '0')->first();
        if ($product) {
            $product_id = $product->id;
            $review = Review::where('user_id', Auth::id())->where('product_id', $product_id)->first();
            if ($review) {
                return view('Frontend.Reviews.edit', compact('review'));
            } else {
                return redirect()->back()->with('status', 'the link is Broken');
            }
        } else {
            return redirect()->back()->with('status', 'the link is Broken');
        }
    }
    public function update(Request $request)
    {
        $user_review = $request->input('user_review');
        if ($user_review != '') {
            $review_id = $request->input('review_id');
            $review = Review::where('id', $review_id)->where('user_id', Auth::id())->first();
            if ($review) {
                $review->user_review = $request->input('user_review');
                $review->update();
                return redirect('category/' . $review->product->category->slug . '/' . $review->product->slug)->with('status', 'Review Updated Successfully');
            } else {
                return redirect()->back()->with('status', 'the link is Broken');
            }
        } else {
            return redirect()->back()->with('status', 'You Cannot Submit Empty Review');
        }
    }
}
