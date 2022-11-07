@extends('layouts.frontend')

@section('title')
    {{ __('My Orders') }}
@endsection

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">Order View
                            <a href="{{url('my-orders')}}" class="btn btn-warning float-end">{{__('Back')}}</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>Shipping Details</h4>
                                <hr>
                                <label for="">First Name</label>
                                <div class="border p-2">{{$order->first_name}}</div>
                                <label for="">Last Name</label>
                                <div class="border p-2">{{$order->last_name}}</div>
                                <label for="">E-mail</label>
                                <div class="border p-2">{{$order->email}}</div>
                                <label for="">Contact No.</label>
                                <div class="border p-2 ">{{$order->phone}}</div>
                                <label for="">Shipping Address</label>
                                <div class="border p-2">
                                    {{$order->address}} ,<br>
                                    {{$order->city}} ,<br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>Order Details</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderitems as $item)
                                            <tr>
                                                <td>{{$item->product->name}}</td>
                                                <td>{{$item->quantity}}</td>
                                                <td>{{$item->price}}</td>
                                                <td>
                                                    <img src="{{asset('assets/uploads/products/' .$item->product->image)}}" width="50px" alt="">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">Grand Total : <span class="float-end">{{$order->total_price}}</span></h4>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
