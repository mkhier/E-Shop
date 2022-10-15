<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view('Admin.Category.index', compact('category'));
    }
    public function create()
    {
        return view('Admin.Category.create');
    }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True? '1':'0';
        $category->popular = $request->input('popular') == True? '1':'0';;
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->save();
        return redirect('categories')->with('status','Category Added Successfully');

    }
    public function edit($id)
    {
        $category = Category::find($id);
        return view('Admin.Category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->slug = $request->input('slug');
        $category->description = $request->input('description');
        $category->status = $request->input('status') == True? '1':'0';
        $category->popular = $request->input('popular') == True? '1':'0';;
        $category->meta_title = $request->input('meta_title');
        $category->meta_keywords = $request->input('meta_keywords');
        $category->meta_description = $request->input('meta_description');
        $category->update();
        return redirect('categories')->with('status','Category Updated Successfully');
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete()->with('status','Category Deleted Successfully');
        return redirect('categories');
    }

}
