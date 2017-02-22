@extends('Layouts.admin')


@section('content')
@if(Session::has('deleted_post'))
    <div class="alert alert-success">
    <div class="container-fluid">
    <div class="alert-icon">
    <i class="material-icons">check</i>
    </div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="material-icons">clear</i></span>
    </button>
    <b>Success Alert:</b> Yuhuuu! {{session('deleted_post')}}
    </div>
    </div>
@endif

<div class="card row">
  <div class="card-header">
      <h3 class="title">All Posts</h3>
      <p class='category'>Includes all the post of users</p>
  </div>
  <div class="card-content table-responsive">
		<table class="table">
			<thead class="text-danger">
				<th>Id</th>
				<th>Owner</th>
				<th>Category</th>
				<th>Photo</th>
				<th>Title</th>
				<th>Body</th>
				<th>Created</th>
				<th>Updated</th>
			</thead>
			<tbody>
        @if($posts)
        @foreach($posts as $post)
        <tr>
          <td>{{$post->id}}</td>
          <td><a href="{{route('posts.edit',$post->id)}}">{{$post->user->name}}</a></td>
          <td>{{$post->category ? $post->category->name : 'Uncategorized'}}</td>
          <td><img src="{{$post->photo ? $post->photo->name : '/photos/post.png'}}" style="width:50px;height:50px;"></td>
          <td>{{$post->title}}</td>
          <!-- <td width="60" height="20"><img style="width:50px;height:50px" class="img-circle" src="{{$post->photo ? $post->photo->name : '/Photos/3.png'}}"></td> -->
          <td>{{str_limit($post->body,7)}}</td>
          <td>{{$post->created_at->diffForHumans()}}</td>
          <td>{{$post->updated_at->diffForHumans()}}</td>
          <!-- {{$post->photo ? $post->photo->name : "Upload !!"}} this is check the condition if the user photo exist the is display the picture
          $post->photo check the user instance photo not !! provide any $post->photo_id //laravel automatically do this we just call the photo method and its return the photo instance. -->
        </tr>
        @endforeach
        @endif
			</tbody>
		</table>
</div>

@stop
