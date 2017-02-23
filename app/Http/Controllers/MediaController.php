<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateMediaRequest;
use App\Photo;

class MediaController extends Controller
{
    public function index()
    {
        $photos=Photo::all();
        return view('media.index',compact('photos'));
    }

    public function store(CreateMediaRequest $request)
    {
        $file=$request->file('file');

        $input['name']=time().$request->file('file')->getClientOriginalName();

        $file->move('photos',$input['name']);

        Photo::create($input);

        return redirect('admin/media');
    }
    public function upload()
    {
        return view('media.upload');
    }

    public function destroy($id)
    {
      $photo=Photo::findOrFail($id);

      unlink(public_path().$photo->name);

      $photo->delete();

      return redirect('admin/media');
    }
}
