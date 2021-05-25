<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WarriorDetail;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WarriorController extends Controller
{
    public function index()
    {
        $warriors = User::whereRoleIs('warrior')->get();
        return view('warrior.viewwarriors', compact('warriors'));
    }

    public function add()
    {
        return view('warrior.addwarrior');
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

        return redirect()->back()->with('status', 'Warrior Registered Successfully');
    }

    public function warriorregistration()
    {
        return view('frontend.warrior.warriorregistration');
    }

    public function storewarrior(Request $request)
    {
        $request->validate([
            'aadhaar_num' => 'required|digits:12',
            'organization' => 'required',
        ]);
        // dd($request);
        $warrior = new WarriorDetail();
        $warrior->user_id = $request->user_id;
        $warrior->status = 'Pending';
        $warrior->aadhaar_num = $request->aadhaar_num;
        $warrior->organization = $request->organization;
        $warrior->serviceAreas = json_encode($request->input('serviceArea'));
        $warrior->supplyTypes = json_encode($request->input('supplyType'));
        $warrior->save();
        //dd($warrior);
        return redirect()->back()->with('status', 'Details Submitted Successfully, Verification will take a short time');
    }

    public function verifyindex()
    {
        $warriors = DB::table('volunteer_details')
            ->join('users', 'users.id', '=', 'volunteer_details.user_id')
            ->select('users.*', 'volunteer_details.*')
            ->get();

        // dd($warriors);
        return view('warrior.verifywarrior', compact('warriors'));
    }
}
