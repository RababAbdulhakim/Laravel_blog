@extends('layouts.app')
 
@section('content')

	<div class="container">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Post</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
	        </div>
	    </div>


		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <h1>  {{ $posts->title }}</h1>
            </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                            <img  class="img-responsive" src= "{{ URL ('images/' . $posts->image) }}" alt="">
                         <img  class="img-responsive" src= "{{$posts->image}}" alt="">


            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $posts->description }}
            </div>
        </div>
            
            <div class=”row">
                 <div class=”col-md-6">
 
                     <div class="ridge" style="     width: 73%;border-bottom: 1px solid;" ><h3>Comments</h3></div>

   
        @foreach($posts->comments as $comment)
        <h4> {{$comment->username}}</h4><br>
            {{$comment->Comment}}
        @endforeach
    
               
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
    {!! Form::open(array('url' => 'posts/comment/'.$posts->id )) !!}

          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
            {!! Form::text('username', null, array('placeholder' => 'Name','class' => 'form-control')) !!}

            </div>
        </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Comment:</strong>
                {!! Form::textarea('Comment', null, array('placeholder' => 'Comment','class' => 'form-control')) !!}
            </div>
          <button type="submit" class="btn btn-info">Submit</button>
	</div>
	{!! Form::close() !!}
	</div>
  </div>
                 </div>
@endsection