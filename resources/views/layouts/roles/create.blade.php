@extends('Admin')

@section('title', 'Add Pharmacy')

@section('content')

<div class="container">


<div class="titlebar ">
	<div class="row ">
		<div class="col-md-6">
			<h1 class="h3">All Role</h1>
		</div>
		<div class="col-md-6 text-md-right">
			<a href="" class="btn btn-circle btn-info">
				<span>Add New Role</span>
			</a>
		</div>
	</div>
</div>

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
                @foreach($roles as $key => $role)
                    <tr>
                        <td>{{ ($key+1) + ($roles->currentPage() - 1)*$roles->perPage() }}</td>
                        <td> {{ $role->name }}</td>
                        <td class="text-right">
                            <a class="btn btn-soft-primary btn-icon btn-circle btn-sm" href="{{route('roles.edit', $role->id )}}" title="Edit">
                                <i class="las la-edit"></i>
                            </a>
                            <a href="#" class="btn btn-soft-danger btn-icon btn-circle btn-sm confirm-delete" data-href="{{route('roles.destroy', $role->id)}}" title="Delete">
                                <i class="las la-trash"></i>
                            </a>
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
