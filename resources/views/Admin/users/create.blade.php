@extends('Layouts.admin')

@section('content')
  <h1>Let's Create Users</h1>
  {!! Form::open(['method'=>'post','action'=>'AdminUsersController@store','class'=>'col-md-4']) !!}

      <div class="form-group">
          {!! Form::label('name','Username') !!}
          {!! Form::text('name',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
          {!! Form::submit('Create User',['class'=>'btn btn-primary']) !!}
      </div>

  {!! Form::close() !!}
@stop
