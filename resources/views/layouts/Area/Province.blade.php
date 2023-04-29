@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <form action="{{ route('provinces.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mt-10">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col">
                                    <select class="form-control" type="name" name="country_id" placeholder="province">

                                    @foreach ( getCountries() as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3 col"><input class="form-control" type="name" name="province_name" placeholder="province" /></div>
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
                            <form action="{{ route('provinces.index') }}" method="get">
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
                                <th class="text-center">Country</th>
                                <th class="text-center">Province</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($provinces as $province)
                                <tr>
                                    <td class="text-center" style="width: 20%;">{{ $loop->iteration }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $province->Country->country_name }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $province->province_name }}</td>
                                    <td class="text-center d-inline-flex d-sm-flex justify-content-sm-center">
                                        <a href="{{ route('provinces.edit', $province->id) }}" class="btn btn-primary" type="button">Edit</a>
                                        <a href="{{ route('provinces.destroy', $province->id) }}" class="btn btn-danger" type="button">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $provinces->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
@endsection
