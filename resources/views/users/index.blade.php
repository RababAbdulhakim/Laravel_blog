@extends('layouts.app')
 
@section('content')
<div class="tab-base">
		<div class="panel">
			<div class="panel-body">
				<div class="tab-content">
	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Users Management</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

<div class="panel-body" id="demo_s">	
 

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
        class="table table-striped table-bordered bootstrap-datatable datatable responsive"
        data-show-export="true"
               data-export-types="['pdf']"

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
<div id='export-div'>
    <h1 style="display:none;"></h1>
    <table id="export-table" data-name='users' data-orientation='p' style="display:none;">
            <thead>
               <tr>
                    <th data-checkbox="true" data-field="no" data-align="right" data-sortable="true"width="280px">No</th>
			<th data-field="name" data-align="right" data-sortable="true"width="280px">Name</th>
			<th data-field="email" data-align="right" data-sortable="true"width="280px">Email</th>
			<th data-field="roles" data-align="right" data-sortable="true"width="280px">Roles</th>
			<th data-field="action" data-align="right" data-sortable="true" width="280px">Action</th>
		</tr>
            </thead>
                
            <tbody >
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
@push('scripts')
<script>

</script>
@endpush
                                </div>
                        </div>
                </div>
</div>
@endsection