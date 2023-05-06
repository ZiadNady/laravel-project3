@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form>
    <div class="container">
        <div class="row">
            <div class="col-md-6"><label class="form-label form-label form-label">First Name</label><input class="form-control form-control form-control" type="text"></div>
            <div class="col-md-6"><label class="form-label form-label form-label">Last Name</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">E-mail</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Password</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Confirm password</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row"><label for="exampleFormControlFile1">profile image</label><input type="file" class="form-control-file" id="exampleFormControlFile1"></div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">National identification</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row text-center"><div><button class="btn btn-primary" type="button">Submit</button></div></div>
    </div>
</form>

@endsection
