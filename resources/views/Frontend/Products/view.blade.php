@extends('layouts.frontend')

@section('title', $products->name)
@section('content')

    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('category') }}">
                    {{ __('Collections') }}
                </a> /
                <a href="{{ url('category/' . $products->category->name) }}">
                    {{ $products->category->name }}
                </a> /
                <a href="{{ url('category/' . $products->category->name . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>



        <div class="container">
            <div class="card-shadow product_data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 border-right">
                            <img src="{{ asset('assets/uploads/products/' . $products->image) }}" class="w-75"
                                alt="">
                        </div>
                        <div class="col-md-4">
                            <h2 class="mb-0">
                                {{ $products->name }}
                                @if ($products->trending == '1')
                                    <label style="font-size: 16px;"
                                        class="float-end badge bg-danger trending_tag">{{ __('Trending') }}</label>
                                @endif
                            </h2>

                            <hr>
                            <label for="" class="me-3">{{ __('Original Price: ') }}<s>{{ $products->original_price }}</s>{{ __(' SYP') }}</label>
                            <label for="" class="fw-bold">{{ __('Selling Price: ') }}{{ $products->selling_price }}{{ __(' SYP') }}</label>
                            <p class="mt-3">
                                {!! $products->small_description !!}
                            </p>

                            <hr>
                            @if ($products->quantity > 0)
                                <label class="badge bg-success">{{ __('In Stock') }}</label>
                            @else
                                <label class="badge bg-danger">{{ __('Out of Stock') }}</label>
                            @endif
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                    <label for="Quantity">{{ __('Quantity') }}</label>
                                    <div class="input-group text-center mb-3" style="width: 130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="qunatity" class="form-control qty-input text-center" value="1" />
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-10">
                                    <br />
                                    @if ($products->quantity > 0)
                                        <button type="button" class="btn btn-primary me-3 AddtoCartBtn float-start">{{ __('Add to Cart ') }}<i class="fa fa-shopping-cart"></i></button>
                                    @else
                                    @endif
                                    <button type="button" class="btn btn-success mt-3 float-start">{{ __('Add to Wishlist ') }}<i class="fa fa-heart"></i></button>
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
                    </div>
                </div>
            </div>
        </div>
    @endsection
