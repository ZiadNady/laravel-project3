@extends('Admin')

@section('title', 'Add product')

@section('content')

    <form action="{{ route('pharmacyProduct.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mt-10">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col"><input class="form-control" type="number" name="price" placeholder="price" /></div>
                            <div class="mb-3 col"><input class="form-control" type="number" name="quantity" placeholder="quantity" /></div>
                            <select class="form-control" type="name" id="product_id" name="product_id">
                                <option>-- select Product --</option>
                                @foreach (getProducts() as $product)
                                    <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                @endforeach
                            </select>
                            <input type="hidden" value="{{ $id }}" name="pharmacy_id"/>
                            <div class="mb-3 col"><input class="form-control" type="date" name="expiration_date" id="expiration_date" placeholder="expiration_date" /></div>
                            <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="container-fluid">
        <div class="card shadow">
            <div class="card-body">
                <div class="row align-items-end">
                    <div class="col-6">
                        <div id="" class="">
                            <form action="{{ route('product.index') }}" method="get">
                                <label class="form-label"><input class="form-control form-control-sm" name="search"
                                        type="search" value="{{ $search }}" aria-controls="dataTable"
                                        placeholder="Search">
                                </label>
                                <button class="btn btn-primary border rounded" type="submit">Filter</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                    <table id="dataTable" class="table my-0">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">product name</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Quantity</th>
                                <th class="text-center">Expiration Date</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pharmacyProducts as $product)
                                <tr>
                                    <td class="text-center" style="width: 20%;">{{ $loop->iteration }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->Product->product_name }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->price }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->quantity }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->expiration_date }}</td>
                                    <td class="text-center d-inline-flex d-sm-flex justify-content-sm-center">
                                        <a href="{{ route('product.edit', $product->id) }}" class="btn btn-primary"
                                            type="button">Edit</a>
                                        <a href="{{ route('product.destroy', $product->id) }}" class="btn btn-danger"
                                            type="button">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pharmacyProducts->appends(request()->input())->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
@endsection

<script>
    const expirationDate = document.getElementById('expiration_date');
    const today = new Date();
    const minDate = new Date(today.getTime() + 7 * 24 * 60 * 60 * 1000).toISOString().split('T')[0];
    expirationDate.setAttribute('min', minDate);
</script>
