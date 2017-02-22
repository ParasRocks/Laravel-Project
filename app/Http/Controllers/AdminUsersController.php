<?php

namespace App\Http\Controllers;
use App\User;
use App\Role;
use App\Photo;
use Illuminate\Http\Request;
use App\Http\Requests\UserCreateRequest;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::all();
        return view('Admin.users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles=Role::pluck('name','id')->all();
        return view('Admin.users.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserCreateRequest $request)
    {
        $input=$request->all();
        //take all the input request to input vriable

        if($file=$request->file('file'))
        //check if the file is exist or not!!
        {
            $name=time().$file->getClientOriginalName();
            //modeification is donw with carbon
            //the name of the file with current time and the client name it's cool.
            $file->move('Photos',$name);
            //store the file in the public/photo directory.
            // the directory is automatically created.

            $photo=Photo::create(['name'=>$name]);
            //The photo is persistent in the photo table and return the refrence of the object is done.

            $input['photo_id']=$photo->id;
            //add extra column in the input field, the photo_id is stored in input['photo_id']
            //now $input includes one more field is photo_id.

        }

        $input['password']=bcrypt($request->password);
        //the password is encrypted and update the password field in the $input

        User::create($input);
        //the user instance create a user with all data

        // return redirect('admin/users');
        //redirect to the admin user section also do this route('name').
        return redirect()->route('users.index');
        //return $request->file('file');
        //the file will produced a empty array
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
        return view('Admin.users.edit');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
