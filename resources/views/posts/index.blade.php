@extends('layouts.app')
 
@section('content')
<div class="col-xs-12 col-md-9 pull-md-3 bd-content">

	<div class="row">
	    <div class="col-lg-6margin-tb">
	        <div class="pull-left">
	            <h1>Posts</h1>
	        </div>
	        <div class="pull-right">
	        	@permission('create-post')
	            <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Item</a>
	            @endpermission
	        </div>
	    </div>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

            
	@foreach ($posts as $post)
        <div class="col-md-9"><h2>{{ $post->title }}</h2>
<!--       this is in uploding      <img  class="img-responsive" src= "{{ URL ('images/' . $post->image) }}" alt="">-->
<!--            this is for generating dummy imags using faker-->
            <img  class="img-responsive" src= "{{$post->image}}" alt="">
            <br>
        <p>{{ $post->description }}</p>
       
        <div class="col-md-3"><a class="btn btn-info" href="{{ route('post.show',$post->id) }}">Show</a>
			@permission('edit-Post')
			<a class="btn btn-primary" href="{{ route('post.edit',$post->id) }}">Edit</a>
			@endpermission
        @permission('delete-post')
			 {!! Form::open(['method' => 'DELETE','route' => ['posts.destroy', $post->id],'style'=>'display:inline']) !!}
                         {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
            {!! Form::close() !!}
        	@endpermission
                 
        </div>
		</div>
     
        
	@endforeach
</div>
        

	{!! $posts->render() !!}


@endsection

