@extends('admin.layouts.app')
 
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>All Roles</h3>
		</div>
		<div class="box-body">
	        <div class="pull-right">
	        	@permission('role-create')
	            <a class="btn btn-success" href="{{ route('roles.create') }}"> Create New Role</a>
	            @endpermission
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<table id="demo-table"
       data-show-refresh="true"
       data-show-toggle="true"
       data-toggle="table"
       data1-url="data1.json"
       data-height="700"
       data-pagination="true" 
       data-search="true"
       data-sort-order="desc"
        data-show-columns="false"
        class="table table-hover"
 >
            <thead>
		<tr>
			<th>No</th>
			<th>Name</th>
			<th>Description</th>
			<th width="280px">Action</th>
		</tr>
            </thead>
            <tbody>
	@foreach ($roles as $key => $role)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $role->display_name }}</td>
		<td>{{ $role->description }}</td>
		<td>
			<a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
			@permission('role-edit')
			<a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
			@endpermission

			@permission('role-delete')
			{!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
        	@endpermission
		</td>
	</tr>
	@endforeach
            </tbody>
	</table>

</section>
	{!! $roles->render() !!}


@endsection