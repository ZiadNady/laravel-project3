@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form action="{{ route('districts.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="container ">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6 col-xl-4">
                <div class="card mt-10">
                    <div class="card-body text-center d-flex flex-column align-items-center">
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="country" name="country_id" placeholder="province">
                                <option>-- select country --</option>
                                @foreach (getCountries() as $country)
                                    <option value="{{ $country->id }}" @if ($country->id == $district->Province->country_id) selected @endif>{{ $country->country_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3 col">
                            <select class="form-control" type="name" id="province" name="province_id"
                                placeholder="province">
                            </select>
                        </div>
                        <input type="hidden" value="{{ $district->id }}" name="id"/>
                        <div class="mb-3 col"><input class="form-control" type="name" name="district_name" placeholder="province" /></div>
                        <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100" type="submit">add</button></div>
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
        countrySelect.addEventListener("change", function() {
            var countryId = countrySelect.value;
            provinceSelect.innerHTML = '<option value="">-- Select Province --</option>';

            fetch('/provinces/getProvinces/' + countryId)
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
