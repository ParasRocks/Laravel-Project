@extends('layouts.admin')

@section('content')

<div class="card">
	<div class="card-header" data-background-color="purple">
		<h4 class="title">Category</h4>
		<p class="category">Manage categories for post.</p>
	</div>
	<div class="card-content table-responsive">
    <div class="col-md-6">
      <h3 class="">Add some categories there.</h3>
      {!! Form::open(['method'=>'post','action'=>'AdminCategoriesController@store','class'=>'form-inline']) !!}

          <div class="form-group label-floating is-empty col-md-5" style="padding-top:20px;">
              {!! Form::text('name',null,['class'=>'form-control col-md-12']) !!}
          </div>
          <div class="form-group label-floating is-empty col-md-4">
              {!! Form::submit('Add Categories',['class'=>'btn btn-primary pull-left']) !!}
          </div>

      {!! Form::close() !!}
    </div>
    <div class="col-md-6">
        <table class="table table-hover">
    			<thead class="text-danger">
    				<th>Id</th>
    				<th>Caterogy Name</th>
    				<th>Created</th>
            <th>Action</th>
    			</thead>
    			<tbody>
            @if($categories)
            @foreach($categories as $category)
    				<tr>
    					<td>{{$category->id}}</td>
    					<td><a href="{{route('categories.edit',$category->id)}}">{{$category->name}}</a></td>
    					<td>{{$category->created_at}}</td>
              <td>
                  {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoriesController@destroy',$category->id] ]) !!}
                  {!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}
              </td>
    				</tr>
            @endforeach
            @endif
    			</tbody>
    		</table>
    </div>
	</div>
</div>
@stop

@section('script')

<script>
$(document).ready(function(){
  $('.data-toggle').dropdown();

});
</script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

@stop
