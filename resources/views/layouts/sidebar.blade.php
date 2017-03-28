<div class="sidebar bd-sidebar">
{!! Form::open(['method'=>'GET','url'=>'/','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
<div class="input-group custom-search-form">
    <input type="text" class="form-control" name="title" id="search_field"placeholder="Search...">
    <span class="input-group-btn">
   
        <button type="button" class="btn btn-input_type dropdown-toggle custom ppy" data-toggle="dropdown">Title<span class="caret"></span></button>
         <div class="dropdown-menu pull-right" style="min-width:102px;">
              <div class="btn custom srt" data-val="title" style="display:block;" ><a href="#" style="color:#C61920">Title</a></div> 
              <div class="btn custom srt" data-val="Category" style="display:block;" ><a href="#" style="color:#C61920">Category</a></div>
                            </div>
     
    </span>
</div>
{!! Form::close() !!}

<h2 class="accordion">Category</h2>
                 
   @foreach ($Categories as $key => $value)
  <div class="panel-group">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">
          <a data-toggle="collapse" href="#collapse{{$key+1}}">{{$value->Category }}</a>
        </h3>
      </div>
 
 
      <div id="collapse{{$key+1}}" class="panel-collapse collapse">
        <ul class="panel-body">
                   @foreach ($value->SubCategories as $values) 

                   <li><a href="{{URL ('SubCategory/'.$values->id)}}">{{$values->SubCategory }}</a>
                   </li> 
  @endforeach</ul>
      </div>
    </div>
  </div>

    @endforeach
</div>