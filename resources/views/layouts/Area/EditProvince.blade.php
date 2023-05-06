@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form action="{{ route('provinces.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mt-10">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="mb-3 col">
                                <select class="form-control" type="name" name="country_id" placeholder="province">

                                @foreach ( getCountries() as $country)
                                    <option value="{{ $country->id }}" @if ($country->id == $province->country_id)selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="{{ $province->id }}" name="id"/>
                        <div class="mb-3 col"><input class="form-control" type="name" name="province_name" placeholder="province" value="{{ $province->provience_name }}"/></div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
