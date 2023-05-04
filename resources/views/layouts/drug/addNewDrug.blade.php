@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<form>
    <div class="container">
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Drug Name :</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Quantity :</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Type :</label><select class="form-select">
                    <optgroup label="This is a group">
                        <option value="12" selected="">This is item 1</option>
                        <option value="13">This is item 2</option>
                        <option value="14">This is item 3</option>
                    </optgroup>
                </select></div>
        </div>
        <div class="row">
            <div class="col"><label class="form-label form-label form-label">Price :</label><input class="form-control form-control form-control" type="text"></div>
        </div>
        <div class="row"><label for="exampleFormControlFile1">Drug Image :</label><input type="file" class="form-control-file" id="exampleFormControlFile1"></div>
        <div class="row text-center"><div><button class="btn btn-primary" type="button">Submit</button></div></div>
    </div>
</form>

@endsection
