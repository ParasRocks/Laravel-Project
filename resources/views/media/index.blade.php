@extends('layouts.admin')


@section('content')

@if($photos)

@foreach($photos as $photo )
<div class="col-md-3">
	<div class="card">
		<div class="card-header card-chart" data-background-color="orange">
			<img src="{{$photo->name}}" style="width:210px;height:200px;" class="img-bordered">
		</div>
		<div class="card-content">
			<h4 class="title"></h4>
			<p class="category"><span class="text-success">Created By user on <span class="text-primary">Hacking.<span class="text-danger">io</span></p>
		</div>
		<div class="card-footer">
			<div class="stats">
				<i class="material-icons">access_time</i> Posted at {{$photo->created_at->diffForHumans()}}
			</div>
			<div class="col-md-12">
				{!! Form::open(['method'=>'DELETE','action'=>['MediaController@destroy',$photo->id], ]) !!}
				{!! Form::submit('Delete',['class'=>'btn btn-danger btn-sm pull-right col-md-4']) !!}
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endforeach

@endif

@stop


@section('script')

<script>
$(document).ready(function(){
  $('.data-toggle').dropdown();

});
</script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

@stop
