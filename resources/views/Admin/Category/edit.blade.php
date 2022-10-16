@extends('layouts.admin')
@section('title')
    {{__('Edit/Update Category')}}
@endsection
@section('content')
    <div class="card">
        <div class="card-header">
            <h4>{{__('Edit/Update Category')}}</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('update-category/' .$category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Name') }}</label>
                        <input type="text" name="name" value ="{{$category->name}}" class ="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Slug') }}</label>
                        <input type="text" name="slug" value ="{{$category->slug}}" class ="form-control" >
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Description') }}</label>
                        <textarea type="text" name="description" rows="3" class ="form-control" value ="{{$category->description}}"></textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Status') }}</label>
                        <input type="checkbox" name="status" value ="{{$category->status == '1' ? 'checked' : ''}}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="name">{{ __('Popular') }}</label>
                        <input type="checkbox" name="popular" value ="{{$category->popular == '1' ? 'checked' : ''}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Title') }}</label>
                        <input type="text" name="meta_title" class ="form-control" value ="{{$category->meta_title}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Keywords') }}</label>
                        <input type="text" name="meta_keywords" class ="form-control" value ="{{$category->meta_keywords}}">
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="name">{{ __('Meta Description') }}</label>
                        <input type="text" name="meta_description" class ="form-control" value ="{{$category->meta_description}}">
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">{{__('Update')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
