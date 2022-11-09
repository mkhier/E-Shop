@extends('layouts.frontend')

@section('title')
    Write A Review
@endsection
@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if ($verified_purchase->count() > 0)
                            <h5>You Are Writing a review for {{ $product->name }}</h5>
                            <form action="{{url('add-review')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                <textarea class="form-control" name="user_review" rows="5" placeholder="Write a review"></textarea>
                                <button type="submit" class="btn btn-primary">Submit Review</button>
                            </form>
                        @else
                            <div class="alert alert-danger">
                                <h5>Your not allowed to review</h5>
                                <p>
                                    Only Customer to purchased this product can review
                                </p>
                                <a href="{{ url('/') }}" class="btn btn-primary">Go to Home Page</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
