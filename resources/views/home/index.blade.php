@extends('home.layouts.app')

@section('content')
@php
    $Future_products = Cache::remember('New_products', 3600, function () {
        return filter_products(\App\Models\Product::orderByRaw('created_at DESC'))->limit(12)->get();
    });
@endphp

@if (count($Future_products) > 0)
    <section class="mb-4">
        <div class="container">
            <div class="px-2 py-4 px-md-4 py-md-3 bg-white shadow-sm rounded">
                <div class="d-flex mb-3 align-items-baseline">
                    <h3 class="h5 fw-700 mb-0">
                      newestproducts
                    </h3>
                </div>
                <div class="aiz-carousel gutters-10 half-outside-arrow" data-items="6" data-xl-items="5" data-lg-items="4"  data-md-items="3" data-sm-items="2" data-xs-items="2" data-arrows='true'>
                    @foreach ($Future_products as $key => $product)
                    <div class="carousel-box">
                        @include('home.inc.product_box',['product' => $product])
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endif
@if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/') }}">Home</a>
    @else
        <a href="{{ route('login') }}">Login</a>
        @if (Route::has('register'))
            <a href="{{ route('register') }}">Register</a>
        @endif
    @endauth
</div>
@endif
<div class="content">
<div class="title m-b-md">
    Laravel
</div>
<div class="links">
    <a href="{{ route('countries.index') }}">Countries</a>
    <a href="{{ route('provinces.index') }}">Cities</a>
</div>
</div>
</div>










@endsection
