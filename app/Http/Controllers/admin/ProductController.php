<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return view('Admin.product.index', compact('product'));
    }
    public function create()
    {
        $category = Category::all();
        return view('Admin.product.create', compact('category'));
    }
    public function store(Request $request)
    {
        $product = new Product();
        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time(). '.' .$ext;
            $file->move('assets/uploads/products/', $filename);
            $product->image = $filename;
        }
        $product->cat_id = $request->input('cat_id');
        $product->name = $request->input('name');
        $product->slug = $request->input('slug');
        $product->small_description = $request->input('small_description');
        $product->description = $request->input('description');
        $product->original_price = $request->input('original_price');
        $product->selling_price = $request->input('selling_price');
        $product->quantity = $request->input('quantity');
        $product->tax = $request->input('tax');
        $product->status = $request->input('status') == true? '1' : '0';
        $product->trending = $request->input('trending') == true? '1' : '0';
        $product->meta_title = $request->input('meta_title');
        $product->meta_description = $request->input('meta_description');
        $product->meta_keywords = $request->input('meta_keywords');
        $product->save();
        return redirect('products')->with('status', 'Product Added Successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('Admin.product.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'assets/uploads/products/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $file->move('assets/uploads/products/', $filename);
                $product->image = $filename;
            }
            $product->cat_id = $request->input('cat_id');
            $product->name = $request->input('name');
            $product->slug = $request->input('slug');
            $product->small_description = $request->input('small_description');
            $product->description = $request->input('description');
            $product->original_price = $request->input('original_price');
            $product->selling_price = $request->input('selling_price');
            $product->quantity = $request->input('quantity');
            $product->tax = $request->input('tax');
            $product->status = $request->input('status') == true? '1' : '0';
            $product->trending = $request->input('trending') == true? '1' : '0';
            $product->meta_title = $request->input('meta_title');
            $product->meta_description = $request->input('meta_description');
            $product->meta_keywords = $request->input('meta_keywords');
            $product->update();
            return redirect('products')->with('status', 'Product Updated Successfully');
        }
    }
    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product->image) {
            $path = 'assets/uploads/products/' . $product->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $product->delete();
        return redirect('products')->with('status', 'Product Deleted Successfully');;
    }
}
