@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col"><input class="form-control" type="name" name="country_name"
                                    placeholder="Country" /></div>
                            <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                    type="submit">add</button></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
        <div class="container-fluid">
            <div class="card shadow ">
                <div class="card-body">
                    <div class="row align-items-end">

                        <div class="col-6">
                            <div id="" class="">
                            <form action="{{  route('countries.index') }}" method="get">
                                <label class="form-label"><input class="form-control form-control-sm" name="search" type="search" value="{{ $search }}" aria-controls="dataTable" placeholder="Search">
                                </label>
                                <button class="btn btn-primary border rounded" type="submit" >Filter</button>
                            </form>
                            </div>
                        </div>
                    </div>
                    <div id="dataTable" class="table-responsive table mt-2" role="grid" aria-describedby="dataTable_info">
                        <table id="dataTable" class="table my-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Name</th>
                                    <th class="text-center" style="width: 10%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $country)
                                    <tr>
                                        <td class="text-center" style="width: 20%;">{{ $country->country_name }}</td>
                                        <td class="text-center d-inline-flex d-sm-flex justify-content-sm-center">
                                            <a class="btn btn-info" href="{{ route('countries.edit',$country->id) }}" >Edit</button>
                                            <a class="btn btn-danger" href="{{ route('countries.destroy',$country->id) }}" >Delete</button></td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                    {{ $countries->onEachSide(5)->links()  }}
                </div>
            </div>
            <div class="float-left w-100">
                <form action="{{ route('countries.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="container ">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-6 col-xl-4">
                                <div class="card">
                                    <div class="card-body text-center d-flex flex-column align-items-center">
                                        <div class="mb-3 col"><input class="form-control" type="name" name="country_name"
                                                placeholder="Country" /></div>
                                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                                type="submit">add</button></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
@endsection
