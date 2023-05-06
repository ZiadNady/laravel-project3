@extends('home.layouts.app')

@section('content')
<div class="card">
    <div class="card-body text-center d-flex flex-column align-items-center">
        <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4"><img class="rounded-circle" style="width: 128px;height: 128px;" src="ZtrackerLogo.jpeg" /></div>
        <form  action="{{ route('login.custom') }}" method="POST"  >
            @csrf
            <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" /></div>
            <div class="mb-3"><input class="form-control" type="password" name="password" placeholder="Password" /></div>
            <div class="mb-3"><button class="btn btn-primary shadow d-block w-100" type="submit">Login</button></div>
            <div class="form-group mb-3">
                <label for="remember">Remember me</label>
                <input type="checkbox" name="remember" value="1">
          </div>
            <p class="text-muted">Create an account <a href="{{ route('register') }}">Sign Up</a></p>
            {{-- <p class="text-muted"> <a href="{{ route('register') }}">Forgot password</a></p> --}}
        </form>
    </div>
</div>









@endsection
