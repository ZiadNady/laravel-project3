@extends('home.layouts.app')

@section('content')

@if (Route::has('login'))
<div class="top-right links">
    @auth
        <a href="{{ url('/home') }}">Home</a>
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
