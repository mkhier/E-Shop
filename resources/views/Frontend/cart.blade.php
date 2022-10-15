@extends('layouts.frontend')

@section('title')
    {{ __('My Cart') }}
@endsection

@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    {{ __('Home') }}
                </a>
                <a href="{{ url('cart') }}">
                    {{ __('Cart') }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-5">
        <div class="card shadow ">
            @if ($cartitems->count() > 0)
                <div class="card-body">
                    @php
                        $total = 0;
                    @endphp
                    @foreach ($cartitems as $item)
                        <div class="row product_data">
                            <div class="col-md-2 my-auto">
                                <img src="{{ asset('assets/uploads/products/' . $item->products->image) }}" alt="" style="width: 70px; height: 70px;">
                            </div>
                            <div class="col-md-5 my-auto">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->selling_price }} {{ __('SYP') }}</h6>
                            </div>
                            <div class="col-md-3 my-auto">
                                <input type="hidden" value="{{ $item->product_id }}" class="prod_id">
                                @if ($item->product->quantity >= $item->product_quantity)
                                    <label for="Quantity">Quantity</label>
                                    <button class="input-group-text changeQuantity decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center"
                                        value="{{ $item->product_quantity }}">
                                    <button class="input-group-text changeQuantity increment-btn">+</button>
                            </div>
                            @php
                                $total += $item->product->selling_price * $item->product_quantity;
                            @endphp
                        @else
                            <h6>{{ __('Out of Stock') }}</h6>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <button class="btn btn-danger delete-cart-item"><i class="fa fa-trash"></i> Remove</button>
                </div>
        </div>
        @endforeach
    </div>
    <div class="card-footer">
        <h6>{{ __('Total Price : ') }}{{ $total }}{{ __('SYP') }}
            <a href="{{ url('checkout') }}" class="btn btn-outline-success float-end">{{ __('Proceed to Checkout') }}</a>
        </h6>

    </div>
@else
    <div class="card-body text-center">
        <h2>Your Cart is Empty</h2>
        <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
    </div>
    @endif
    </div>
    </div>
@endsection
