@extends('layouts.frontend')

@section('title')
    {{ __('My Wishlist') }}
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home </a> /
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow ">
            <div class="card-body text-center">
                @if ($wishlist->count() > 0)
                    @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}" width="70px"
                                    height="70px" alt="">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->name }}</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->selling_price }} SYP</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                @if ($item->product->quantity >= $item->product_quantity)
                                <div class="input-group text-center my-auto" style="width: 110px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" value="1" class="form-control text-center qty-input" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-primary addToCartBtn"><i class="fa fa-shopping-cart"></i> Add to Cart </button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger removeWishlist"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div>
                    @endforeach
            </div>
        @else
            <h4>There Are no Products in Your Wishlist</h4>
            @endif
        </div>
    </div>
    </div>
@endsection
