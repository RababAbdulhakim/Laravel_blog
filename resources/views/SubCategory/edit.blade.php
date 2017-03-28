@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2>Edit Post</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('SubCategory.index') }}"> Back</a>
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

	{!! Form::model($SubCategory, ['method' => 'PATCH','route' => ['SubCategory.update', $SubCategory->id]]) !!}

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                {!! Form::text('title', null, array('placeholder' => 'Title','class' => 'form-control')) !!}
            </div>
        </div>
            <select name="cat_id">
                     @foreach($Categories as $Category)
                     <option value="{{$Category->id}}">{{$Category->title}}</option>
                     @endforeach
                </select>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
				<button type="submit" class="btn btn-primary">Submit</button>
        </div>

	</div>
	{!! Form::close() !!}


@endsection