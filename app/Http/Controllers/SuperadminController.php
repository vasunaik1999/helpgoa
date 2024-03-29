<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SuperadminController extends Controller
{
    public function index()
    {
        $superadmins = User::whereRoleIs('superadmin')->get();
        return view('superadmin.viewsuperadmin', compact('superadmins'));
    }

    public function add()
    {
        return view('superadmin.addsuperadmin');
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

        return redirect()->back()->with('status', 'SuperAdmin Registered Successfully');
    }

    public function moredetails(User $user)
    {
        return view('superadmin.moredetails', compact('user'));
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
}
