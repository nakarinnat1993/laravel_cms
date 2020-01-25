<?php

namespace App\Http\Controllers;

use App\User;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }
    public function makeadmin(User $user)
    {
        $user->role='admin';
        $user->save();
        Session()->flash('success', 'Update success');
        return redirect(route('users.index'));
    }
}
