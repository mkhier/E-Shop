@extends('layouts.frontend')

@section('title')
    {{ __('Welcome to E-Shop') }}
@endsection

@section('content')
    @include('layouts.inc.Frontend.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ __('Featured Products') }}</h2>
                <div class="owl-carousel featured_carousel owl-theme">
                    @foreach ($featured_product as $prod)
                        <div class="item">
                            <a href="{{ url('category/' . $prod->category->slug . '/' . $prod->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $prod->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $prod->name }}</h5>
                                        <span class="float-start">{{ $prod->selling_price }}</span>
                                        <span class="float-end"><s>{{ $prod->original_price }}</s></span>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>{{ __('Trending Categories') }}</h2>
                <div class="owl-carousel featured_carousel owl-theme">
                    @foreach ($trending_category as $tcategory)
                        <div class="item">
                            <a href="{{ url('category/' . $tcategory->slug) }}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/products/' . $tcategory->image) }}" alt="">
                                    <div class="card-body">
                                        <h5>{{ $tcategory->name }}</h5>
                                        <p>
                                            {{ $tcategory->description }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $('.featured_carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    </script>
@endsection
