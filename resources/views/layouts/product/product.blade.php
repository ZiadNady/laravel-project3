@extends('Admin')

@section('title', 'Add product')

@section('content')

    <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mt-10">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col"><input class="form-control" type="name" name="product_name" placeholder="Product name" /></div>
                            <div class="mb-3 col">
                                <select class="form-control" type="name" id="country" name="category" placeholder="province">
                                    <option>-- select Category --</option>
                                    <option value="Preparations"> Preparations </option>
                                    <option value="Liquid"> Liquid </option>
                                    <option value="Tablet"> Tablet </option>
                                    <option value="Capsules"> Capsules </option>
                                    <option value="Topical medicines">Topical medicines</option>
                                    <option value="Suppositories"> Suppositories </option>
                                    <option value="Drops"> Drops </option>
                                    <option value="Inhalers"> Inhalers </option>
                                    <option value="Injections"> Injections </option>
                                    <option value="Implants or patches"> Implants or patches</option>
                                </select>
                            </div>
                            <div class="mb-3 col"><input class="form-control" type="name" name="product_code" placeholder="Product code" /></div>
                            <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                    type="submit">add</button></div>
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
                                <th class="text-center">Category</th>
                                <th class="text-center">Code</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td class="text-center" style="width: 20%;">{{ $loop->iteration }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->product_name }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->category }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $product->product_code }}</td>
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
                {{ $products->appends(request()->input())->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
@endsection
