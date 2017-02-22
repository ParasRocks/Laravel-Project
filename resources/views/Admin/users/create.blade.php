@extends('Layouts.admin')

@section('content')
  <div>
      <h1 style="width:500px;margin:auto;">Let's Create Users</h1>
      <div class="seperator"></div>
  </div>
  <div>
  {!! Form::open(['method'=>'post','action'=>'AdminUsersController@store','class'=>'col-md-10','files'=>true]) !!}

      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('name','Username') !!}
          {!! Form::text('name',null,['class'=>'form-control']) !!}
													<!-- <label class="control-label">Username</label>
													<input type="text" class="form-control">
												<span class="material-input"></span> -->
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('role_id','Role of User') !!}
          {!! Form::select('role_id',$roles,null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('email','Email') !!}
          {!! Form::email('email',null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('is_active','Status') !!}
          {!! Form::select('is_active',array(1=>'Active',0=>'Not Active'),0,['class'=>'form-control']) !!}
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
      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::label('password','Password') !!}
          {!! Form::text('password',null,['class'=>'form-control']) !!}
      </div>

      <div class="form-group label-floating is-empty col-md-6">
          {!! Form::submit('Create User',['class'=>'btn btn-primary btn-lg col-md-6']) !!}
      </div>

  {!! Form::close() !!}
  </div>
  @include('includes.formError')

@stop
