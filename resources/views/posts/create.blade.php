@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Create New Post</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

	@if (count($errors) > 0)
		<div class="alert alert-danger">
			<strong>Whoops!</strong> There were some problems with your input.<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif

	{!! Form::open(array('route' => 'posts.store','method'=>'POST','files' => true )) !!}
	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::textarea('description', null, array('placeholder' => 'Description','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {!! Form::file('image', null, array('placeholder' => 'Upload an image','class' => 'form-control','style'=>'height:100px')) !!}
            </div>
        </div>
           
             <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SubCategory:</strong>
                <select name="sub_cat_id">
                             @foreach($subcat as $cat)
                             <option value="{{$cat->id}}">
                                    {{$cat->title}}
                                
                             </option>
                          @endforeach
                        </select>
            </div>
        </div>
            @foreach($posts as $post)
            <input name="post_id" type="hidden" value="{{$post->id}}++">
            @endforeach
            
            @foreach($users as $user)
            <input name="author" type="hidden" value="{{$user->id}}">
            @endforeach
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>

	</div>
	{!! Form::close() !!}

@endsection