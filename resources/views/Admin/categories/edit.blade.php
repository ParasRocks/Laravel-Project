@extends('layouts.admin')

@section('content')
<div class='col-md-6'>
<div class="card">
  <div class="card-header card-chart" data-background-color="orange">
    <img src="/photos/128.jpg" style="height:200px;width:500px;" class="img-responsive img-rounded">
  </div>
  <div class="card-content">
      {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoriesController@update',$category->id],'class'=>'form-inline']) !!}

          <div class="form-group label-floating is-empty col-md-6" style="padding-top:20px;">
              {!! Form::text('name',null,['class'=>'form-control col-md-12']) !!}
          </div>
          <div class="form-group label-floating is-empty col-md-4">
              {!! Form::submit('Update',['class'=>'btn btn-primary pull-left']) !!}
          </div>

      {!! Form::close() !!}
  </div>
</div>
</div>
@stop
