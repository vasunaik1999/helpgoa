<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.myprofile');
    }

    public function store(Request $request)
    {
        //dd($request);
        //dd($request);
        $request->validate([
            'name' => 'required',
            'secondaryPhone' => 'nullable|digits:10',
        ]);

        $user = User::find($request->id);
        $user->name = $request->input('name');
        $user->secondaryPhone = $request->input('secondaryPhone');
        $user->email = $request->input('email');
        $user->pincode = $request->input('pincode');
        $user->city1 = $request->input('city1');
        $user->taluka1 = $request->input('taluka1');
        $user->addressLine1 = $request->input('addressLine1');
        $user->city2 = $request->input('city2');
        $user->taluka2 = $request->input('taluka2');
        $user->addressLine2 = $request->input('addressLine2');
        $user->isCovidPos = $request->input('isCovidPos');
        $user->isCovidPosFamily = $request->input('isCovidPosFamily');
        $user->isCovidSymptoms = $request->input('isCovidSymptoms');
        // dd($user);

        $user->update();
        return redirect()->back()->with('status', 'Profile Updated Successfully');
    }
}
