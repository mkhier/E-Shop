@extends('layouts.admin')
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Edit/Update Product') }}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <select class="form-select">
                            <option value="">{{$product->category->name}}</option>
                        </select>
                        <Input  type="hidden"  name="cat_id" value="{{$product->cat_id}}">
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" class=" form-control" value="{{ $product->name }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Slug') }}</label>
                        <input type="text" name="slug" class=" form-control" value="{{ $product->slug }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('small Description') }}</label>
                        <textarea type="text" name="small_description" rows="3" class=" form-control"
                            value="{{ $product->small_description }}"></textarea>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Description') }}</label>
                        <textarea type="text" name="description" rows="3" class=" form-control" value="{{ $product->description }}"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Original_Price') }}</label>
                        <input type="number" name="original_price" class=" form-control"
                            value="{{ $product->original_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Selling Price') }}</label>
                        <input type="number" name="selling_price" class=" form-control"
                            value="{{ $product->selling_price }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Tax') }}</label>
                        <input type="number" name="tax" class=" form-control" value="{{ $product->tax }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Quantity') }}</label>
                        <input type="number" name="quantity" class=" form-control" value="{{ $product->quantity }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Status') }}</label>
                        <input type="checkbox" name="status" value="{{ $product->status == '1' ? 'checked' : '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Trending') }}</label>
                        <input type="checkbox" name="popular" value="{{ $product->trending == '1' ? 'checked' : '' }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Title') }}</label>
                        <input type="text" name="meta_title" class=" form-control" value="{{ $product->meta_title }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Keywords') }}</label>
                        <input type="text" name="meta_keywords" class=" form-control"
                            value="{{ $product->meta_keywords }}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Description') }}</label>
                        <input type="text" name="meta_description" class=" form-control"
                            value="{{ $product->meta_description }}">
                    </div>
                    @if ($product->image)
                        <img src="{{ asset('assets/uploads/products/' . $product->image) }}" alt="">
                    @endif
                    <div class="col-md-12">
                        <input type="file" name="image" class=" form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
