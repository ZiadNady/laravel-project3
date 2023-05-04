@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6">
                        <label for="country_name" class="form-label form-label form-label">Country</label>
                        <input class="form-control form-control form-control" type="text" name="country_name" id="country_name">
                        @error('country_name')
                        <div>{{ $message }}</div>
                    @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="row text-center"><div><button class="btn btn-primary" type="submit">Submit</button></div></div>
    </div>
</form>


@endsection
