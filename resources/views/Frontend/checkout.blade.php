@extends('layouts.frontend')

@section('title')
    {{ __('Checkout') }}
@endsection

@section('content')
    <div class="container mt-5">
        <form action="{{url('place-order')}}" method="POST">
            {{csrf_field()}}
        <div class="row">
            <div class="col-md-7">
                <div class="card">
                    <h6>{{ __('Basic Details') }}</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">{{ __('First Name') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->name}}" name="first_name" placeholder="">
                        </div>
                        <div class="col-md-6">
                            <label for="">{{ __('Last Name') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->last_name}}" name="last_name" placeholder="Enter Last Name">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">{{ __('E-mail') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->email}}" name="email" placeholder="Enter E-mail">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->phone}}" name="phone" placeholder="Enter Phone Number">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">{{ __('Address 1') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->address}}"  name="address1" placeholder="Enter Address One">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">{{ __('City') }}</label>
                            <input type="text" class="form-control" value="{{Auth::user()->city}}" name="city" placeholder="Enter City">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <h6>{{ __('Order Details') }}</h6>
                    <hr>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{__('Name')}}</th>
                                <th>{{__('Quantity')}}</th>
                                <th>{{__('Price')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                                <tr>
                                    <td>{{ $item->product->name }}</td>
                                    <td>{{ $item->product->quantity }}</td>
                                    <td>{{ $item->product->selling_price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary float-end">{{__('Place Order')}}</button>
                </div>
            </div>
        </div>
    </form>
    </div>
@endsection
