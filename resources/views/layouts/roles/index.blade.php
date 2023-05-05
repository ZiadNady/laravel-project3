@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

    <div class="container">


        <form action="{{ route('roles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="container ">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 col-xl-4">
                        <div class="card">
                            <div class="card-body text-center d-flex flex-column align-items-center">
                                <div class="mb-3 col"><input class="form-control" type="name" name="name"
                                        placeholder="role" /></div>

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

        <div class="card">
            <div class="card-header">
                <h5 class="mb-0 h6">Roles</h5>
            </div>
            <div class="card-body">
                <table class="table aiz-table">
                    <thead>
                        <tr>
                            <th width="10%">#</th>
                            <th>Name</th>
                            <th width="10%">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $key => $role)
                            <tr>
                                <td>{{ $key + 1 + ($roles->currentPage() - 1) * $roles->perPage() }}</td>
                                <td> {{ $role->name }}</td>
                                <td class="text-right">
                                    <a class="btn btn-soft-primary btn-icon btn-circle btn-sm"
                                        href="{{ route('roles.edit', $role->id) }}" title="Edit">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    @php
                                        echo delete_route('roles.destroy', $role->id);
                                    @endphp


                                    {{-- <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="  {{route('roles.destroy', $role->id)}}" title="Delete">
                                <i class="fa-solid fa-trash"></i>
                            </a> --}}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="aiz-pagination">
                    {{ $roles->appends(request()->input())->links() }}
                </div>
            </div>
        </div>

    </div>

@endsection
