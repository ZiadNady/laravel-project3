@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form action="{{ route('pharmacy.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mt-10">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="mb-3 col"><input class="form-control" type="name" name="pharmacy_name" placeholder="Pharmacy name" /></div>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="country" name="country_id" placeholder="province">
                                <option>-- select country --</option>
                                @foreach (getCountries() as $country)
                                    <option value="{{ $country->id }}">{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <input type="hidden" value="{{ $pharmacy->id }}" name="id"/>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="province" name="province_id" placeholder="province">
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="district" name="district_id" placeholder="district">
                            </select>
                        </div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                type="submit">add</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        var countrySelect = document.getElementById("country");
        var provinceSelect = document.getElementById("province");
        var districtSelect = document.getElementById("district")

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

        provinceSelect.addEventListener("change", function() {
            console.log("hi");
            var provienceId = provinceSelect.value;
            districtSelect.innerHTML = '<option value="">-- Select District --</option>';

            fetch('{{ route('districts.getDistricts',"") }}/'+provienceId)
                .then(function(response) {
                    return response.json();
                })
                .then(function(data) {
                    data.forEach(function(district) {
                        var option = document.createElement("option");
                        option.value = district.id;
                        option.text = district.district_name;
                        districtSelect.appendChild(option);
                    });
                })
                .catch(function() {
                    alert('There was an error retrieving the districts.');
                });
        });
    });
</script>
@endsection
