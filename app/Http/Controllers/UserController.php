<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = User::with('profile')->get();
        return view('user.index', compact('users'));
    }
    public function profile(User $user){
        return view('profile.edit', compact('user'));
    }
}
