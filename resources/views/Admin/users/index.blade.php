@extends('Layouts.admin')

@section('content')
<div>
@if(Session::has('deleted_user'))
    <div class="alert alert-success">
    <div class="container-fluid">
    <div class="alert-icon">
    <i class="material-icons">check</i>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="material-icons">clear</i></span>
    </button>
    <b>Success Alert:</b> Yuhuuu! {{session('deleted_user')}}
    </div>
    </div>
@endif
<div class="card">
	<div class="card-header" data-background-color="purple">
		<h4 class="title">User Details</h4>
		<p class="category">Hacking Project with some perople of diffrent roles.</p>
	</div>
	<div class="card-content table-responsive">
		<table class="table">
			<thead class="text-danger">
				<th>Id</th>
				<th>Name</th>
				<th>Email</th>
				<th>Role</th>
				<th>Status</th>
				<th>Profile Picture</th>
				<th>Created</th>
				<th>Updated</th>
			</thead>
			<tbody>
        @if($users)
        @foreach($users as $user)
        <tr data-userid={}>
          <td>{{$user->id}}</td>
          <td><a href="{{route('users.edit',$user->id)}}" id="edit">{{$user->name}}</a></td>
          <td>{{$user->email}}</td>
          <td>{{$user->role->name}}</td>
          <td class="{{$user->is_active ? 'text-success' : 'text-danger'}}"><b>{{$user->is_active ? "Active" : "Not Active"}}</b></td>
          @if($user->photo)
          <td width="60" height="20"><img style="width:50px;height:50px" class="img-circle" src="{{$user->photo ? $user->photo->name : '/Photos/3.png'}}"></td>
          @endif
          <td>{{$user->created_at->diffForHumans()}}</td>
          <td>{{$user->updated_at->diffForHumans()}}</td>
          <!-- {{$user->photo ? $user->photo->name : "Upload !!"}} this is check the condition if the user photo exist the is display the picture
          $user->photo check the user instance photo not !! provide any $user->photo_id //laravel automatically do this we just call the photo method and its return the photo instance. -->
        </tr>
        @endforeach
        @endif
			</tbody>
		</table>
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
