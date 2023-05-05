@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <div class="container">


        <form action="{{ route('roles.update', $role->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container ">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body text-center d-flex flex-column align-items-center">
                                <div class="mb-3 col"><input class="form-control" type="name" name="name"
                                        placeholder="role" value="{{ $role->name }}"  /></div>

                                <div class="mb-3 col">
                                    <div class="row">
                                        <div class="col">
                                            <label class="col-from-label">Products</label>
                                        </div>
                                        <div class="col">
                                            <label class=" mb-0">
                                                <input type="checkbox" name="permissions[]" class="form-control "
                                                    value="2">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <label class="col-from-label">Products</label>
                                        </div>
                                        <div class="col">
                                            <label class="mb-0">
                                                <input type="checkbox" name="permissions[]" class="form-control "
                                                    value="4">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <div class="mb-3 col"><button class="btn btn-primary shadow d-block w-100"
                                        type="submit">add</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
@endsection
