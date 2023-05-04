@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <form action="{{ route('districts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container ">
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mt-10">
                        <div class="card-body text-center d-flex flex-column align-items-center">
                            <div class="mb-3 col">
                                <select class="form-control" type="name" id="country" name="country_id" placeholder="province">
                                    <option>-- select country --</option>
                                    @foreach (getCountries() as $country)
                                        <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3 col">
                                <select class="form-control" type="name" id="province" name="province_id"
                                    placeholder="province">
                                </select>
                            </div>
                            <div class="mb-3 col"><input class="form-control" type="name" name="district_name"
                                    placeholder="province" /></div>
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
                            <form action="{{ route('districts.index') }}" method="get">
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
                                <th class="text-center">District</th>
                                <th class="text-center" style="width: 10%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($districts as $district)
                                <tr>
                                    <td class="text-center" style="width: 20%;">{{ $loop->iteration }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $district->Province->Country->country_name }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $district->Province->province_name }}</td>
                                    <td class="text-center" style="width: 20%;">{{ $district->district_name }}</td>
                                    <td class="text-center d-inline-flex d-sm-flex justify-content-sm-center">
                                        <a href="{{ route('districts.edit', $district->id) }}" class="btn btn-primary"
                                            type="button">Edit</a>
                                        <a href="{{ route('districts.destroy', $district->id) }}" class="btn btn-danger"
                                            type="button">Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{ $districts->appends(request()->input())->onEachSide(5)->links() }}
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var countrySelect = document.getElementById("country");
            var provinceSelect = document.getElementById("province");

            countrySelect.addEventListener("change", function() {
                var countryId = countrySelect.value;
                provinceSelect.innerHTML = '<option value="">-- Select Province --</option>';

                fetch('{{ route('provinces.getProvinces',"") }}/'+countryId)
                    .then(function(response) {
                        return response.json();
                    })
                    .then(function(data) {
                        data.forEach(function(province) {
                            var option = document.createElement("option");
                            option.value = province.id;
                            option.text = province.province_name;
                            provinceSelect.appendChild(option);
                        });
                    })
                    .catch(function() {
                        alert('There was an error retrieving the provinces.');
                    });
            });
        });
    </script>
@endsection
