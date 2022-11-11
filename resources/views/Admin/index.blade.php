@extends('layouts.admin')

@section('title')
    {{ __('Admin Dashboard') }}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Welcome To Admin Panel Mr. {{ $user->name . ' ' . $user->last_name }}</h4>
        </div>
    @endsection
