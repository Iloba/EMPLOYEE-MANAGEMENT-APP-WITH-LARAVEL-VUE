<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserStoreRequest;
use App\Http\Requests\UserUpdateRequest;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::latest()->get();
        if($request->has('search')){
            $users = User::where('username', 'like', "%{$request->search}%")->orWhere('email', 'like', "%$request->search%")->get();
        }


        
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserStoreRequest $request)
    {
         User::create([
            'username' => $request->username,
            'lastname' => $request->lastname,
            'firstname' => $request->firstname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('message', 'User Registered Successsfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserUpdateRequest $request, $id)
    {
        $user = User::find($id);

        $user->username = is_null($request->username) ? $user->username : $request->username;
        $user->lastname = is_null($request->lastname) ? $user->lastname : $request->lastname;
        $user->firstname = is_null($request->firstname) ? $user->firstname : $request->firstname;
        $user->email = is_null($request->email) ? $user->email : $request->email;
        $user->password = is_null($request->password) ? $user->password : Hash::make($request->password);
       
        $user->save();

        return redirect()->route('users.index')->with('message', 'User Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if(auth()->user()->id == $user->id){
            return redirect()->route('users.index')->with('message', 'You cannnot Delete yourself');
        }

        $user->delete();

        return redirect()->route('users.index')->with('message', 'User Successfully Deleted');
    }

  
}
