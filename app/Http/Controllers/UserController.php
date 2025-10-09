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

    public function edit(ProfileUser $user){
        return view('user.edit', compact('user'));
    }

    public function store(CreateProfileRequest $request, ProfileUser $user){
        $date = $request->validated();
        if($request->hasFile('avatar')){
            $path = $request->file('avatar')->store('prpfile', 'public');
            $date['avatar'] = $path;
        }
        ProfileUser::created($date);
        return redirect()->route('user.show', $user->id);
    }

    public function show($id)
    {
        $user = ProfileUser::find($id);        
        return view('user.show', compact('user'));
    }
}
