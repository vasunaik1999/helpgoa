<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::whereRoleIs('user')->get();
        return view('user.viewusers', compact('users'));
    }

    public function add()
    {
        return view('user.adduser');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10|unique:users',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        $user->attachRole($request->role_id);
        event(new Registered($user));

        return redirect()->back()->with('status', 'User Registered Successfully');
    }

    public function moredetails(User $user)
    {
        return view('user.moredetails', compact('user'));
    }

    public function banuser(Request $request)
    {
        // dd($request);
        $user = User::find($request->user_id);
        // dd($user);

        $user->isBanned = $request->isBanned;
        $user->update();

        return redirect()->back()->with('status', 'Updated Successfully');
    }

    public function bannedpage()
    {
        return view('frontend.banned');
    }

    public function makeAdmin(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->hasRole('user')) {
            $user->detachRole('user');
            $user->attachRole('admin');
        }

        return redirect()->back()->with('status', 'Assigned Admin Role to the User Successfully');
    }
}
