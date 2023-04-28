@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form>
    <div class="container">
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">User ID :</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Doctor ID :</label><input class="form-control form-control form-control" type="text"></div>
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
        <div class="row">
            <div class="col"><input type="checkbox"><span> Is your flat is on main street ?</span></div>
        </div>
        <div class="row text-center"><div><button class="btn btn-primary" type="button">Submit</button></div></div>
    </div>
</form>

@endsection
