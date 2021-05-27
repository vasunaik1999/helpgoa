<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::whereRoleIs('admin')->get();
        return view('admin.viewadmin', compact('admins'));
    }

    public function add()
    {
        return view('admin.addadmin');
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

        return redirect()->back()->with('status', 'Admin Registered Successfully');
    }

    public function moredetails(User $user)
    {
        return view('admin.moredetails', compact('user'));
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
