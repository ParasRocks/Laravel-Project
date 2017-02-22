@extends('Layouts.admin')


@section('content')

<div class="card row">
  <div class="card-header row">
    <div class="col-md-6">
      <h3 class="title">Some Changes on Post</h3>
      <p class='category'>Includes all the post of users</p>
    </div>
    {!! Form::open(['method'=>'DELETE','action'=>['AdminPostsController@destroy',$post->id],'class'=>'col-md-6' ]) !!}
      <div class="form-group label-floating col-md-12 pull-right">
          {!! Form::submit('Delete Post',['class'=>'btn btn-danger col-md-3 pull-right btn-lg']) !!}
      </div>
    {!! Form::close() !!}
  </div>
  <div class="card-content">
    {!! Form::model($post,['method'=>'PATCH','action'=>['AdminPostsController@update',$post->id],'class'=>'','files'=>true]) !!}

        <div class="form-group label-floating is-empty col-md-6">
            {!! Form::label('title','Post Title') !!}
            {!! Form::text('title',null,['class'=>'form-control']) !!}
                            <!-- null is used for default values -->
                            <!-- <label class="control-label">Username</label>
                            <input type="text" class="form-control">
                            <span class="material-input"></span> -->
        </div>
        <div class="form-group label-floating is-empty col-md-6">
            {!! Form::label('category_id','Category') !!}
            {!! Form::select('category_id',$categories,null,['class'=>'form-control']) !!}
            <!-- $roles is an array that containes the pluck(lists) of all type of role in database? -->
        </div>
        <div class="form-group label-floating is-empty col-md-6">
            {!! Form::label('body','Post') !!}
            {!! Form::textarea('body',null,['class'=>'form-control','placeholder'=>'Whats your mind, today?','rows'=>"3"]) !!}
        </div>
        <div class="form-group is-fileinput col-md-6">
              <input type="file" id="inputFile4" multiple="" name="file">
              <div class="input-group">
                <input type="text" readonly="" class="form-control" placeholder="Upload a picture">
                  <span class="input-group-btn input-group-sm">
                    <button type="button" class="btn btn-fab btn-fab-mini">
                      <i class="material-icons">attach_file</i>
                    </button>
                  </span>
              </div>
        </div>
        <!-- there is an problem with the file input is that the file you are selected is not display on the input field -->
        <div class="form-group label-floating is-empty col-md-12">
            {!! Form::submit('Update Post',['class'=>'btn btn-primary btn-lg col-md-3']) !!}
        </div>
    {!! Form::close() !!}

  </div>
</div>
@include('includes.formError')

@stop
