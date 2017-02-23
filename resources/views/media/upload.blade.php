@extends('layouts.admin')

@section('head')

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.css" type="text/css" rel="stylesheet">

@stop

@section('content')

<div class="col-md-8">
	<div class="card">
		<div class="card-header card-chart" data-background-color="orange">
			<img src="/photos/photo.jpg" class="img-bordered" style="height:300px;">
		</div>
		<div class="card-content">
      {!! Form::open(['method'=>'post','action'=>'MediaController@store','class'=>'dropzone','files'=>true]) !!}
          <!-- <div class="form-group is-fileinput col-md-6" style="padding-left:90px;padding-top:17px;">
                <input type="file" id="inputFile4" multiple="" name="file">
                <div class="input-group">
                  <input type="text" readonly="" class="form-control" placeholder="Upload a picture">
                    <span class="input-group-btn input-group-sm">
                      <button type="button" class="btn btn-fab btn-fab-mini">
                        <i class="material-icons">attach_file</i>
                      </button>
                    </span>
                </div>
          </div> -->

          <!-- there is an problem with the file input is that the file you are selected is not display on the input field -->

      {!! Form::close() !!}

      @include('includes.formError');
		</div>
	</div>
</div>
@stop

@section('script')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/min/dropzone.min.js"></script>

@stop
