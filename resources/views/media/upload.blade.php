@extends('layouts.admin')

@section('head')

<link href="/assets/css/bootstrap.min.css" rel="stylesheet" />

<link href="/assets/css/dropzone.min.css" type="text/css" rel="stylesheet">

@stop

@section('content')

<div class="col-md-8">
	<div class="card">
		<div class="card-header card-chart" data-background-color="orange">
			<img src="/photos/photo.jpg" class="img-bordered" style="height:300px;">
		</div>
		<div class="card-content">
      {!! Form::open(['method'=>'post','action'=>'MediaController@store','class'=>'dropzone','files'=>true]) !!}
      {!! Form::close() !!}
      @include('includes.formError');
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
<script src="/assets/js/dropzone.min.js"></script>

@stop
