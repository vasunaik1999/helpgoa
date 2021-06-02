<?php

namespace App\Http\Controllers;

use App\Models\Role;
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

    public function warriorregistration($id)
    {

        $warrior = WarriorDetail::where('user_id', '=', $id)->orderBy('id', 'desc')->first();
        //dd($warrior);
        // $warrior = NULL;
        return view('frontend.warrior.warriorregistration', compact('warrior'));
    }

    public function storewarrior(Request $request)
    {

        if ($request->has('warrior_reg_id')) {
            $request->validate([
                'aadhaar_num' => 'required|digits:12|numeric',
            ]);
            $warrior = WarriorDetail::find($request->warrior_reg_id);
            $warrior->user_id = $request->user_id;
            $warrior->status = 'Pending';
            $warrior->aadhaar_num = $request->aadhaar_num;
            $warrior->organization = $request->organization;
            $warrior->serviceAreas = json_encode($request->input('serviceArea'));
            $warrior->supplyTypes = json_encode($request->input('supplyType'));
            $warrior->update();
        } else {
            $request->validate([
                'aadhaar_num' => 'required|digits:12|numeric|unique:volunteer_details',
                'organization' => 'required',
            ]);
            $warrior = new WarriorDetail();
            $warrior->user_id = $request->user_id;
            $warrior->status = 'Pending';
            $warrior->aadhaar_num = $request->aadhaar_num;
            $warrior->organization = $request->organization;
            $warrior->serviceAreas = json_encode($request->input('serviceArea'));
            $warrior->supplyTypes = json_encode($request->input('supplyType'));
            $warrior->save();
            // dd($warrior);
        }
        return redirect()->back()->with('status', 'Details Submitted Successfully, Verification will take a short time');
    }

    public function verifyindex()
    {
        $warriors = DB::table('volunteer_details')
            ->join('users', 'users.id', '=', 'volunteer_details.user_id')
            ->select('users.*', 'volunteer_details.*')
            ->orderBy('volunteer_details.id', 'desc')->get();

        // dd($warriors);
        return view('warrior.verifywarrior', compact('warriors'));
    }

    public function verifyview($id)
    {
        $warrior_registration = WarriorDetail::find($id);
        $user = User::find($warrior_registration->user_id);
        // dd($warrior_registration);
        return view('warrior.viewverifywarrior', compact('user', 'warrior_registration'));
    }

    public function verifyagree(Request $request)
    {
        $warrior = WarriorDetail::find($request->reg_id);

        $warrior->status = 'Inprogress';
        $warrior->verified_by = $request->user_id;
        $warrior->update();
        // dd($warrior);

        return redirect()->back();
    }

    public function verifydisagree(Request $request)
    {
        $warrior = WarriorDetail::find($request->reg_id);

        $warrior->status = 'Pending';
        $warrior->verified_by = null;
        $warrior->update();
        // dd($warrior);

        return redirect()->back();
    }

    public function verifyaccept(Request $request)
    {
        $warrior = WarriorDetail::find($request->reg_id);

        $warrior->status = 'Accepted';
        $warrior->verified_by = $request->user_id;
        $warrior->note = $request->note;
        // dd($warrior);
        $warrior->update();

        $user = User::find($warrior->user_id);

        if ($user->hasRole('user')) {
            $user->detachRole('user');
            $user->attachRole('warrior');
        }


        return redirect()->back();
    }
    public function verifyreject(Request $request)
    {
        // dd($request);
        $request->validate([
            'reason' => 'required',
        ]);

        $warrior = WarriorDetail::find($request->reg_id);

        $warrior->status = 'Rejected';
        $warrior->verified_by = $request->user_id;
        $warrior->note = $request->note;
        $warrior->reason = $request->reason;
        // dd($warrior);
        $warrior->update();


        $user = User::find($warrior->user_id);

        if ($user->hasRole('warrior')) {
            $user->detachRole('warrior');
            $user->attachRole('user');
        }

        return redirect()->back();
    }

    public function moredetails(User $user)
    {
        // dd($user);
        $warriordetails = WarriorDetail::where('user_id', '=', $user->id)->orderBy('id', 'desc')->first();
        // dd($warriordetails);
        return view('warrior.moredetails', compact('user', 'warriordetails'));
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

    public function makeAdmin(Request $request)
    {
        $user = User::find($request->user_id);
        if ($user->hasRole('warrior')) {
            $user->detachRole('warrior');
            $user->attachRole('admin');
        }

        return redirect()->back()->with('status', 'Assigned Admin Role to the User Successfully');
    }

    public function displaylogin()
    {
        $id = Auth::user()->id;
        $warrior = WarriorDetail::where('user_id', '=', $id)->orderBy('id', 'desc')->first();
        // dd($warrior);
        return view('frontend.warrior.warriorregistration',compact('warrior'));
    }
}
