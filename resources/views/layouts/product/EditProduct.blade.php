@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

@php
    $drugTypes = ['Preparations', 'Liquid', 'Tablet', 'Capsules', 'Topical medicines', 'Suppositories', 'Drops', 'Inhalers', 'Injections', 'Implants or patches'];
    $categories = ["Children's milk", "Medical accessories", "pharmaceutical", "General Accessories", "Yves Rocher", "Care for women", "Beauty and perfumes", 'Mother and Child', "Care For Men", "Vitamins and supplements", "Covid-19 Protection", "Medical care services"];

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
                            <select class="form-control" type="name" id="drug_type" name="drug_type">
                                <option>-- select Drug Type --</option>
                                @foreach ($drugType as $drugType)
                                    <option value="{{ $drugType }}" @if($drugType == $product->drugType) selected @endif>{{ $drugType }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col"><input class="form-control" type="name" name="product_code" placeholder="Product code" value="{{ $product->product_code }}"/></div>
                        <div class="mb-3 col"><input class="form-control" type="file" name="image" placeholder="image" /></div>
                        <div class="mb-3 col"><input class="form-control" type="name" name="Company" placeholder="company" /></div>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="category" name="category">
                                <option>-- select Category --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category }}" @if($category == $product->category) selected @endif>{{ $category }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
