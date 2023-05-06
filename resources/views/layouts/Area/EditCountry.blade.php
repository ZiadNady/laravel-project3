@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <form action="{{ route('countries.update', $country->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col">
                                <input type="hidden" value="{{ $country->id }}" name="id"/>
                                <input class="form-control" type="name" name="country_name" placeholder="Country"
                                    value="{{ $country->country_name }}" />
                            </div>
                            <div class="mb-3 col">
                                <button class="btn btn-primary shadow d-block w-100" type="submit">add</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
