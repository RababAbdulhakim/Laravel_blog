@extends('admin.layouts.app')
@section('content')
<section class="content">
	<div class="box box-primary">
		<div class="box-header">
			<h3>Edit User ({{$user->name}})</h3>
		</div>
		<div class="box-body">

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show User</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
			<a class="btn btn-primary" href="{{ route('post.edit',$user->id) }}">Edit</a>
	        </div>
	    </div>
	</div>

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $user->name }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $user->email }}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Roles:</strong>
                @if(!empty($user->roles))
					@foreach($user->roles as $v)
						<label class="label label-success">{{ $v->display_name }}</label>
					@endforeach
				@endif
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Posts:</strong>
					@foreach($authors as $author)
                                        <div class="row">

		<div class="col-md-3">
            <div class="form-group">
                <ul>
                    <li>
                        <a class="btn btn-link" href="{{ route('post.show',$author->id) }}"><h4> {{ $author->title }}</h4></a>
			<a class="btn btn-info" href="{{ route('post.edit',$author->id) }}">Edit</a>
                         {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $author->id],'style'=>'display:inline']) !!}
                         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
                        
                    </li>
                </ul>
                
			
               
            </div>
        </div>

	</div>
					@endforeach
            </div>
        </div>

	</div>
		</div>

</section>
@endsection