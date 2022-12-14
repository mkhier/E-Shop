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
                        <h4 class="text-white">My Orders</h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Total Price</th>
                                    <th>Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td>{{ date('d-M-Y H:i:s A',strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('view-order/' .$item->id) }}" class="btn btn-primary text-white">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
