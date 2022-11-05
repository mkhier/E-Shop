@extends('layouts.frontend')

@section('title')
    {{ __('My Cart') }}
@endsection
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow ">
            @if ($cartItems->count() > 0)
                <div class="card-body">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartItems as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}" width="70px"
                                    height="70px" alt="">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->product->name }}</h3>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->selling_price }} SYP</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->product_id }}">
                                @if ($item->product->quantity > $item->product_quantity)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width: 110px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" value="{{ $item->product_quantity }}"
                                            class="form-control text-center qty-input" />
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    @php
                                        $total += $item->product->selling_price * $item->product_quantity;
                                    @endphp
                                @else
                                    <h6>Out of Stock</h6>
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger delete-cart-item">Remove <i class="fa fa-trash"></i></button>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    <h6>Total Price : {{ $total }} SYP
                        <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">Proceed to Checkout</a>
                    </h6>
                </div>
            @else
                <div class="card-body text-center">
                    <h2>Your Cart is Empty </h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
