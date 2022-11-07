@extends('layouts.frontend')

@section('title', $products->name)
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    Collections </a> /
                <a href="{{ url('category/' . $products->category->slug) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->slug . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-100" alt="">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label style="font-size: 16px;"
                                    class="float-end badge bg-danger trending_tag">{{ __('Trending') }}</label>
                            @endif
                        </h2>
                        <hr>

                        <label class="me-3">Original Price : <s>{{ $products->original_price }} SYP</s></Original></label>
                        <label class="fw-bold">Selling Price : {{ $products->original_price }} SYP</label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        @if ($products->quantity > 0)
                            <label class="badge bg-success">In Stock</label>
                        @else
                            <label class="badge bg-danger">Out of Stock</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width: 110px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1"
                                        class="form-control text-center qty-input" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br />
                                @if ($products->quantity > 0)
                                    <button type="button" class="btn btn-primary me-3 addToCartBtn float-start">Add to Cart
                                        <i class="fa fa-shopping-cart"></i></button>
                                @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start">Add to Wishlist <i
                                        class="fa fa-heart"></i></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <hr>
                    <h3>{{ __('Description') }}</h3>
                    <p class="mt-3">
                        {!! $products->description !!}
                    </p>
                    <div class="rating-css">
                        <div class="star-icon">
                            <input type="radio" value="1" name="product_rating" checked id="rating1">
                            <label for="rating1" class="fa fa-star"></label>
                            <input type="radio" value="2" name="product_rating" id="rating2">
                            <label for="rating2" class="fa fa-star"></label>
                            <input type="radio" value="3" name="product_rating" id="rating3">
                            <label for="rating3" class="fa fa-star"></label>
                            <input type="radio" value="4" name="product_rating" id="rating4">
                            <label for="rating4" class="fa fa-star"></label>
                            <input type="radio" value="5" name="product_rating" id="rating5">
                            <label for="rating5" class="fa fa-star"></label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
