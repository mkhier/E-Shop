@extends('layouts.admin')
@section('title')
    {{__('Add Category')}}
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{__('Add Category')}}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('store-category') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" class ="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Slug') }}</label>
                        <input type="text" name="slug" class ="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Description') }}</label>
                        <textarea type="text" name="description" rows="3" class ="form-control"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Status') }}</label>
                        <input type="checkbox" name="status">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Popular') }}</label>
                        <input type="checkbox" name="popular">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Title') }}</label>
                        <input type="text" name="meta_title" class ="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Keywords') }}</label>
                        <input type="text" name="meta_keywords" class ="form-control">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Description') }}</label>
                        <input type="text" name="meta_description" class ="form-control">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{__('Create')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
