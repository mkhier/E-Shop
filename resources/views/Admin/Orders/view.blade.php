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
                            <a href="{{ url('orders') }}" class="btn btn-warning float-end">{{ __('Back') }}</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 order-details">
                                <h4>{{__('Shipping Details')}}</h4>
                                <hr>
                                <label for="">{{__('First Name')}}</label>
                                <div class="border">{{ $order->first_name }}</div>
                                <label for="">{{__('Last Name')}}</label>
                                <div class="border">{{ $order->last_name }}</div>
                                <label for="">{{__('E-mail')}}</label>
                                <div class="border">{{ $order->email }}</div>
                                <label for="">{{__('Contact No.')}}</label>
                                <div class="border ">{{ $order->phone }}</div>
                                <label for="">{{__('Shipping Address')}}</label>
                                <div class="border">
                                    {{ $order->address }} ,<br>
                                    {{ $order->city }} ,<br>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <h4>{{__('Order Details')}}</h4>
                                <hr>
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>{{__('Name')}}</th>
                                            <th>{{__('Quantity')}}</th>
                                            <th>{{__('Price')}}</th>
                                            <th>{{__('Image')}}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($order->orderitems as $item)
                                            <tr>
                                                <td>{{ $item->product->name }}</td>
                                                <td>{{ $item->quantity }}</td>
                                                <td>{{ $item->price }}</td>
                                                <td>
                                                    <img src="{{ asset('assets/uploads/products/' . $item->product->image) }}"
                                                        width="50px" alt="">
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <h4 class="px-2">{{__('Grand Total :')}} <span class="float-end">{{ $order->total_price }}</span>
                                </h4>
                                <div class="mt-5 px-2">
                                    <label for="">{{ __('Order Status') }}</label>
                                    <form action="{{ url('update-order/' . $order->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <select class="form-select" name="order_status">
                                            <option {{ $order->status == '0' ? 'selected' : '' }} value="0">{{__('Pending')}}</option>
                                            <option {{ $order->status == '1' ? 'selected' : '' }} value="1">{{__('Completed')}}</option>
                                        </select>
                                        <button type="submit" class="btn btn-primary float-end mt-3">
                                            {{ __('Update') }}
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
