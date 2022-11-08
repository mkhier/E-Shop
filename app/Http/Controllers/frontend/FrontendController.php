<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Rating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_product = Product::where('trending', '1')->take(15)->get();
        $trending_category = Category::where('popular', '1')->take(15)->get();
        return view('Frontend.index', compact('featured_product', 'trending_category'));
    }
    public function category()
    {
        $category = Category::where('status', '0')->get();
        return view('Frontend.category', compact('category'));
    }
    public function view_category($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $product = Product::where('cat_id', $category->id)->where('status', '0')->get();
            return view('Frontend.Products.index', compact('category', 'product'));
        } else {
            return redirect('/')->with('status', 'slug does not exist');
        }
    }
    public function view_product($cate_slug, $prod_slug)
    {
        if (Category::where('slug', $cate_slug)->exists()) {

            if (Product::where('slug', $prod_slug)->exists()) {

                $products = Product::where('slug', $prod_slug)->first();
                $ratings = Rating::where('product_id', $products->id)->get();
                $rating_sum = Rating::where('product_id', $products->id)->sum('stars_rated');
                $user_rating = Rating::where('product_id', $products->id)->where('user_id',Auth::id())->first();

                if ($ratings->count() > 0) {
                    $rating_value = $rating_sum / $ratings->count();
                } else {
                    $rating_value = 0;
                }


                return view('Frontend.Products.view', compact('products', 'ratings', 'rating_value','user_rating'));
            } else {

                return redirect('/')->with('status', 'The Link is Broken');
            }
        } else {
            return redirect('/')->with('status', 'Category not found');
        }
    }
    public function product_list_ajax()
    {
        $products = Product::select('name')->where('status', '0')->get();
        $data = [];
        foreach ($products as $item) {
            $data[] = $item['name'];
        }
        return $data;
    }
    public function search_product(Request $request)
    {
        $searched_product = $request->product_name;
        if ($searched_product != "") {
            $product = Product::where("name", "LIKE", "%$searched_product%")->first();
            if ($product) {
                return redirect('category/' . $product->category->slug . '/' . $product->slug);
            } else {
                return redirect()->back()->with('status', 'No Products Matched');
            }
        } else {
            return redirect()->back();
        }
    }
}
