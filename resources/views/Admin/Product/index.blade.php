@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{__('Products')}}
            <a href="{{url('create-product')}}" class="btn btn-primary float-right">{{__('Create')}}</a>
        </h4>
        </div>
        <div class="card-body">
            <table class="table table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Category') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('image') }}</th>
                        <th>{{ __('Quantity') }}</th>
                        <th>{{ __('Selling price') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($product as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->category->name}}</td>
                            <td>{{$item->name}}</td>
                            <td>
                                <img src="{{asset('assets/uploads/products/'.$item->image)}}" class="prod-img" alt="">
                            </td>
                            <td>{{$item->quantity}}</td>
                            <td>{{$item->selling_price}}</td>
                            <td>
                                <a href="{{url('edit-product/'. $item->id)}}" class="btn btn-success">{{__('Edit')}}</a>
                                <a href="{{url('delete-product/'. $item->id)}}" class="btn btn-danger">{{__('Delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
