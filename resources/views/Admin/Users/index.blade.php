@extends('layouts.admin')

@section('title')
    {{ __('Users') }}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{ __('Registerd Users') }}</h4>
            {{-- <a href="{{url('create-product')}}" class="btn btn-primary float-right">{{__('Create')}}</a> --}}
        </div>
        <div class="card-body">
            <table class="table table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th>
                        <th>{{ __('Role') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('E-mail') }}</th>
                        <th>{{ __('Phone') }}</th>
                        <th>{{ __('Action') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->role }}</td>
                            <td>{{ $item->name }}</td>
                            {{-- <td>{{$item->first_name .''.$item->last_name}}</td> --}}
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a href="{{ url('view-user/' . $item->id) }}"
                                    class="btn btn-success">{{ __('View') }}</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
