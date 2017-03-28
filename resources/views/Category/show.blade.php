@extends('layouts.app')
 
@section('content')

	<div class="row">
	    <div class="col-lg-12 margin-tb">
	        <div class="pull-left">
	            <h2> Show Category</h2>
	        </div>
	        <div class="pull-right">
	            <a class="btn btn-primary" href="{{ route('Category.index') }}"> Back</a>
	        </div>
	    </div>
	</div>

	<div class="row">

		<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $Category->title }}
            </div>
        </div>
<div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">

            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                {{ $Category->description }}
            </div>
        </div>
   <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>SubCategories</strong>
                <ul>
                                            @foreach($Subcategory as $Subcat)

                    <li>
                        <a class="btn btn-link" href="{{ route('SubCategory.show',$Subcat->id) }}"><h4> {{ $Subcat->title }}</h4></a>
                    </li>
                </ul>
                        @endforeach
                        </div>
        </div>
	</div>

@endsection