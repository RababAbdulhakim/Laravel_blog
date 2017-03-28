@extends('admin.layouts.app')
@section('content')
<section class="content">
<div class="box box-primary">
<div class="box-header">
	<h3>All Users</h3>
</div>
	<div class="box-body">
		<a href="{{url('/users/create')}}" class = "btn btn-success"><i class="fa fa-plus fa-md" aria-hidden="true"></i> New</a>
		<table id="demo-table" 
       data-show-refresh="true"
       data-toggle="table"
       data1-url="data.json"
      
       data-pagination="true" 
       data-search="true"
        class="table table-hover table-bordered bootstrap-datatable datatable responsive "

>
       

    <thead>
		<tr>
                    <th data-field="no" data-align="right" data-sortable="true"width="280px">No</th>
			<th data-field="name" data-align="right" data-sortable="true"width="280px">Name</th>
			<th data-field="email" data-align="right" data-sortable="true"width="280px">Email</th>
			<th data-field="roles" data-align="right" data-sortable="true"width="280px">Roles</th>
			<th data-field="action" data-align="right" data-sortable="true" width="280px">Action</th>
		</tr>
                </thead>
                <tbody>
	@foreach ($data as $key => $user)
	<tr>
		<td>{{ ++$i }}</td>
		<td>{{ $user->name }}</td>
		<td>{{ $user->email }}</td>
		<td>
			@if(!empty($user->roles))
				@foreach($user->roles as $v)
					<label class="label label-success">{{ $v->display_name }}</label>
				@endforeach
			@endif
		</td>
		<td>
			<a class="btn btn-info" href="{{ route('users.show',$user->id) }}">Show</a>
			<a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
			{!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        	{!! Form::close() !!}
		</td>
	</tr>
	@endforeach
        </tbody>
	</table>
</div>
</div>
</section>
@endsection
