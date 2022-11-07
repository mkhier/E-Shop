@extends('layouts.frontend')

@section('title')
    {{ __('Checkout') }}
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row checkout-form">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" value="{{Auth::user()->name}}" placeholder="Enter First Name" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="Last_name">Last Name</label>
                                    <input type="text" name="last_name" value="{{Auth::user()->last_name}}" placeholder="Enter Last Name" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Last_name">E-mail</label>
                                    <input type="text" name="email" value="{{Auth::user()->email}}" placeholder="Enter E-mail" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Last_name">Phone Number</label>
                                    <input type="text" name="phone" value="{{Auth::user()->phone}}" placeholder="Enter Phone Number" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Last_name">Address</label>
                                    <input type="text" name="address" value="{{Auth::user()->address}}" placeholder="Enter Address" class="form-control">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="Last_name">City</label>
                                    <input type="text" name="city" value="{{Auth::user()->city}}" placeholder="Enter City" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Qty</td>
                                        <td>Price</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($cartItems as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->product_quantity }}</td>
                                            <td>{{ $item->product->selling_price }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <hr>
                            <button type="submit" class="btn btn-primary w-100">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
