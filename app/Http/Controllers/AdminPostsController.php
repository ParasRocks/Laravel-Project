<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use App\Like;
use App\Photo;
use App\Category;
use App\Http\Requests\CreatePostsRequest;
class AdminPostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::all();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::pluck('name','id')->all();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $user=Auth::user();

        $input=$request->all();

        if($file=$request->file('file'))
        {

            $name=time().$file->getClientOriginalName();

            $file->move('Photos',$name);

            $photo= Photo::create(['name'=>$name]);

            $input['photo_id']=$photo->id;

        }

        $user->posts()->create($input);

        return redirect('/admin/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        $categories=Category::pluck('name','id')->all();

        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $input=$request->all();

        if($file=$request->file('file'))
        {

            $name=time().$file->getClientOriginalName();

            $file->move('Photos',$name);

            $photo= Photo::create(['name'=>$name]);

            $input['photo_id']=$photo->id;

        }//also make this function

        Auth::user()->posts()->whereId($id)->first()->update($input);

        return redirect('admin/posts');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);

        unlink(public_path().$post->photo->name);

        $post->delete();

        \Session::flash('deleted_post','The post has been deleted, lest post something else');

        return redirect('admin/posts');

    }

    public function likePost(Request $request)
    {
      $post_id=$request->postId;
      $is_like=$request->isLike === 'true' ? "1" : "0";
      $update=false;
      $post=Post::findOrFail($post_id);
      //return $post;
      $user=Auth::user();
      //return $user;
      $like=$user->likes->where('post_id',$post_id)->first();

      if($like)
      {
        $already_like=$like->like;
        $update=true;
        if($already_like == $is_like){
          $like->delete();
          return null;
        } else {
            $like;
        }
        $like->like=$is_like;
        $like->user_id=$user->id;
        $like->post_id=$post->id;
        if($update){
          $like->update();
        }
        else{
          $like->save();
        }
        return null;
      }
      else{
        $like = new Like();
        $like->like=$is_like;
        $like->user_id=$user->id;
        $like->post_id=$post->id;
        $like->save();
      }
    }
}
