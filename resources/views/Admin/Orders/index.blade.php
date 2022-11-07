@extends('layouts.admin')

@section('title')
    {{ __('Orders') }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h4 class="text-white">{{ __('New Orders') }}
                            <a href="{{ url('order-history') }}"
                                class="btn btn-warning float-right">{{ __('Order History') }}</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('Order ID') }}</th>
                                    <th>{{ __('Total Price') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th>{{ __('Created At') }}</th>
                                    <th>{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($order as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->total_price }}</td>
                                        <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                        <td>{{ date('d-M-Y H:i:s A', strtotime($item->created_at)) }}</td>
                                        <td>
                                            <a href="{{ url('admin/view-order/' . $item->id) }}" class="btn btn-primary">View</a>
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
    </div>
@endsection
