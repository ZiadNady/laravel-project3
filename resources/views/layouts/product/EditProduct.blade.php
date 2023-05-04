@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

@php
    $categories = ['Preparations', 'Liquid', 'Tablet', 'Capsules', 'Topical medicines', 'Suppositories', 'Drops', 'Inhalers', 'Injections', 'Implants or patches'];
@endphp

<form action="{{ route('pharmacy.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mt-10">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="mb-3 col"><input class="form-control" type="name" name="product_name" placeholder="Product name" value="{{ $product->product_name }}"/></div>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="country" name="category" placeholder="province">
                                <option>-- select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" @if($category == $product->category) selected @endif>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col"><input class="form-control" type="name" name="product_code" placeholder="Product code" value="{{ $product->product_code }}"/></div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                type="submit">add</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
