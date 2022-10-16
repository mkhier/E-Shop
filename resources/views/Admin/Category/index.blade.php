@extends('layouts.admin')

@section('title')
    {{ __('Categories') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{__('Categories')}}
                <a href="{{url('create-category')}}" class="btn btn-primary float-right">{{__('Create')}}</a>
            </h4>
        </div>

        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Description') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category as $item)
                        <tr>
                            <td>{{$item->id}}</td>
                            <td>{{$item->name}}</td>
                            <td>{{$item->description}}</td>
                            <td>
                                <a href="{{url('edit-category/'.$item->id)}}" class="btn btn-success">{{__('Edit')}}</a>
                                <a href="{{url('delete-category/'.$item->id)}}" class="btn btn-danger">{{__('Delete')}}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
