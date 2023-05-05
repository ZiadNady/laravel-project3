@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form action="{{ route('pharmacyProduct.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mt-10">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="mb-3 col"><input class="form-control" type="number" name="price" value={{ $pharmacyProduct->price }} placeholder="price" /></div>
                        <div class="mb-3 col"><input class="form-control" type="number" name="quantity" value={{ $pharmacyProduct->quantity }} placeholder="quantity" /></div>
                        <select class="form-control" type="name" id="product_id" name="product_id">
                            <option>-- select Product --</option>
                            @foreach (getProducts() as $product)
                                <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                            @endforeach
                        </select>
                        <input type="hidden" value="{{ $Product_id }}" name="productPharmacy"/>
                        <input type="hidden" value="{{ $id }}" name="pharmacy_id"/>
                        <div class="mb-3 col"><input class="form-control" type="date" name="expiration_date" id="expiration_date" min="{{ date('Y-m-d') }}" value="{{ $pharmacyProduct->expiration_date }}" /></div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
