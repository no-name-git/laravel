<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProfileRequest;
use App\Models\ProfileUser;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('profile')->get();
        return view('user.index', compact('users'));
    }

    public function edit(ProfileUser $id){
        return view('user.edit', compact('id'));
    }

    public function update(CreateProfileRequest $request, ProfileUser $id ){
        $date = $request->validated();
        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('profile', 'public');
            $date['avatar'] = $path;
        }

        $id->update($date);
        return redirect()->route('user.show', $id->id);
    }

    public function show($id)
    {

        $user = ProfileUser::find($id);   
        return view('user.show', compact('user'));
    }
}
