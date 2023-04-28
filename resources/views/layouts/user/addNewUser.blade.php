@extends('Admin')

@section('title', 'Add User')

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
            <div class="row">
                <div class="col"><label class="form-label form-label form-label">Gender</label>
                    <div><input type="radio" name="gender" value="male"><span>Male </span><input type="radio" name="gender" value="female"><span>Female </span></div>
                </div>
            </div>
            <div class="row"><label class="control-label" for="date">Date</label><input class="form-control" id="date" name="date" placeholder="MM/DD/YYY" type="text"></div>
            <div class="row"><label for="exampleFormControlFile1">profile image</label><input type="file" class="form-control-file" id="exampleFormControlFile1"></div>
            <div class="row">
                <div class="col"><label class="form-label form-label form-label">Phone number</label><input class="form-control form-control form-control" type="text"></div>
            </div>
            <div class="row">
                <div class="col"><label class="form-label form-label form-label">National identification</label><input class="form-control form-control form-control" type="text"></div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-6"><label class="form-label form-label form-label">Country</label><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
                        <div class="col-md-6"><label class="form-label form-label form-label">Province</label><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="row">
                        <div class="col-md-6"><label class="form-label form-label form-label">City</label><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
                        <div class="col-md-6"><label class="form-label form-label form-label">District</label><select class="form-select">
                                <optgroup label="This is a group">
                                    <option value="12" selected="">This is item 1</option>
                                    <option value="13">This is item 2</option>
                                    <option value="14">This is item 3</option>
                                </optgroup>
                            </select></div>
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
                <div class="col">
                    <div class="row">
                        <div class="col-md-6"><label class="form-label form-label form-label">Floor no.</label><input class="form-control form-control form-control" type="text"></div>
                        <div class="col-md-6"><label class="form-label form-label form-label">Flat no.</label><input class="form-control form-control form-control" type="text"></div>
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
