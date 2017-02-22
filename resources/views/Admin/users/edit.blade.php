@extends('Layouts.admin')

@section('content')
  <div class="card">
    <div class="card-header" data-background-color="green">
      <h4 class="title text-white">User Profile<h4>
      <!-- <p class="category">{{$user->name.' is an '.$user->role->name.' in Hacking Project.'}}</p> -->
    </div>
  <div class="card-content col-md-12">
  <div class="row">


  <div class="col-md-3">
      <img src="{{$user->photo ? $user->photo->name : '/Photos/1.png'}}" class="img-responsive img-rounded img-bordered" style="background-color:#efefef;widht:150px;height:180px;">
      {!! Form::open(['method'=>'DELETE','action'=>['AdminUsersController@destroy',$user->id] ]) !!}
        <div class="form-group label-floating">
            {!! Form::submit('Delete User',['class'=>'btn btn-danger col-md-12']) !!}
        </div>
      {!! Form::close() !!}
  </div>

  <div class="col-md-8 row col-md-offset-1">
    {!! Form::model($user,['method'=>'PATCH','action'=>['AdminUsersController@update',$user->id],'class'=>'col-md-10','files'=>true]) !!}
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('name','Username') !!}
          {!! Form::text('name',null,['class'=>'form-control']) !!}
                          <!-- null is used for default values -->
													<!-- <label class="control-label">Username</label>
													<input type="text" class="form-control">
												  <span class="material-input"></span> -->
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('role_id','Role of User') !!}
          {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
          <!-- $roles is an array that containes the pluck(lists) of all type of role in database? -->
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('email','Email') !!}
          {!! Form::email('email',null,['class'=>'form-control','placeholder'=>'Parasrocks@example.com']) !!}
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('is_active','Status') !!}
          {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),null,['class'=>'form-control']) !!}
          <!-- manually create an array for active status just pass a key value pair -->
      </div>
      <div class="form-group is-fileinput col-md-6">
            <input type="file" id="inputFile4" multiple="" name="file">
            <div class="input-group">
              <input type="text" readonly="" class="form-control" placeholder="Placeholder w/file chooser...">
                <span class="input-group-btn input-group-sm">
                  <button type="button" class="btn btn-fab btn-fab-mini">
                    <i class="material-icons">attach_file</i>
                  </button>
                </span>
            </div>
      </div>
      <!-- there is an problem with the file input is that the file you are selected is not display on the input field -->
      <div class="form-group label-floating is-empty col-md-12">
          {!! Form::submit('Update Details',['class'=>'btn btn-success btn-lg col-md-6']) !!}
          {!! Form::close() !!}
      </div>
  </div>
</div>
  </div>
</div>
@include('includes.formError')

@stop
