@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form>
    <div class="container">
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Pharmacy Name:</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">priority :</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6"><label class="form-label form-label form-label">Country</label><input class="form-control form-control form-control" type="text"></div>
                    <div class="col-md-6"><label class="form-label form-label form-label">Province</label><input class="form-control form-control form-control" type="text"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6"><label class="form-label form-label form-label">City</label><input class="form-control form-control form-control" type="text"></div>
                    <div class="col-md-6"><label class="form-label form-label form-label">District</label><input class="form-control form-control form-control" type="text"></div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="row">
                    <div class="col-md-6"><label class="form-label form-label form-label">Street Name</label><input class="form-control form-control form-control" type="text"></div>
                    <div class="col-md-6"><label class="form-label form-label form-label">Building no.</label><input class="form-control form-control form-control" type="text"></div>
                </div>
            </div>
        </div>
        <div class="row text-center"><div><button class="btn btn-primary" type="button">Submit</button></div></div>
    </div>
</form>

@endsection
