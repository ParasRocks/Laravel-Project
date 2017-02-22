@extends('Layouts.admin')

@section('content')
<div>
    <h1>Users</h1>
    <div class="col-md-10 table-responsive">
        <table class="table table-hover table-bordered">
          <tr>
            <td>id</td><td>Name</td><td>Email</td><td>Role</td><td>Status</td><td>Created</td><td>Updated</td>
          </tr>
          @if($users)
          @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td><td>{{$user->name}}</td><td>{{$user->email}}</td><td>{{$user->role->name}}</td><td>{{$user->is_active ? "Active" : "Not Active"}}<td>{{$user->created_at->diffForHumans()}}</td><td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>
          @endforeach
          @endif
        </table>
    </div>
</div>
@stop
