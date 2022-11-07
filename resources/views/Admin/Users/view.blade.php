@extends('layouts.admin')

@section('title')
    {{$user->name .' ' .$user->last_name}}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>{{ __('User Details') }}
                            <a href="{{url('users')}}" class="btn btn-primary btn-sm float-right">{{__('Back')}}</a>
                        </h4>
                        <hr>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('Role') }}</label>
                                <div class="p-2 border">{{ $user->role }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('First Name') }}</label>
                                <div class="p-2 border">{{ $user->name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('Last Name') }}</label>
                                <div class="p-2 border">{{ $user->last_name }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('E-mail') }}</label>
                                <div class="p-2 border">{{ $user->email }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('Phone') }}</label>
                                <div class="p-2 border">{{ $user->phone }}</div>
                            </div>
                            <div class="col-md-4 mt-3">
                                <label for="">{{ __('Address') }}</label>
                                <div class="p-2 border">{{ $user->address }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
