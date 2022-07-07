<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index',["users"=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            "avatar" => 'required|image|file|max:3000',
            "name"=>'required',
            "email"=> 'required|unique:users,email,',
            'password'=> 'min:6'
        ]);
        if ($request->file('avatar')) {
            $validatedData['avatar']= $request->file('avatar')->move('avatars',$request->file('avatar')->hashName());
        }else{
            $validatedData['avatar'] ='';
        }
        $password = Hash::make($validatedData['password']);
       
        User::create([
            "email"=> $validatedData["email"],
            "password"=> $password,
            "name"=> $validatedData["name"],
            "avatar"=> $validatedData["avatar"],
        ]);

        
        return redirect()->route('user.index');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('user.edit',[
            'user'=> $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            "email"=> 'required|unique:users,email, '.$user->id,
            "avatar" => 'image|file|max:3000',
            "name"=>'required',
        ]);
        if ($request['password']!= null) {
            $request->validate([
                'password'=> 'min:6'
            ]);
            $password = Hash::make($request['password']);
            
        }else{
            $password = $user->password;
        }
        
        if ($request->file('avatar')) {
            if ($user->avatar != '') {
                File::delete(public_path($user->avatar));
            }
            $validatedData['avatar']= $request->file('avatar')->move('avatars',$request->file('avatar')->hashName());
        }else{
            $validatedData['avatar'] = $user->avatar;
        }

        User::where('id',$user->id)->update([
            "email"=> $validatedData["email"],
            "password"=> $password,
            "name"=> $validatedData["name"],
            "avatar"=> $validatedData["avatar"],
        ]);
        return redirect('admin/dashboard');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        File::delete(public_path($user->avatar));
        User::destroy($user->id);
        return response()->json([
            "message"=> "Berhasil Hapus Data"
        ]);
    }
}
