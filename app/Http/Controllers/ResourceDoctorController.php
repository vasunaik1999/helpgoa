<?php

namespace App\Http\Controllers;

use App\Models\ResourceDoctor;
use Illuminate\Http\Request;

class ResourceDoctorController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceDoctor::where('visibility', '=', '1')->get();
        return view('frontend.resources.doctorconsultant.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceDoctor::all();
        return view('frontend.resources.doctorconsultant.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.doctorconsultant.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'nullable|digits:10',
        ]);

        $resource = new ResourceDoctor();
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->consultation_type = $request->consultation_type;
        $resource->availability = $request->availability;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "1";
        $resource->save();
        return redirect()->back()->with('status', 'Doctor Added Successfully');
    }

    public function show(ResourceDoctor $resourceDoctor)
    {
        //
    }

    public function edit(ResourceDoctor $resourceDoctor)
    {
        $resource = $resourceDoctor;
        return view('frontend.resources.doctorconsultant.edit', compact('resource'));
    }

    public function update(Request $request, ResourceDoctor $resourceDoctor)
    {
        $request->validate([
            'name' => 'required',
            'contact' => 'nullable|digits:10',
        ]);

        $resource = ResourceDoctor::find($request->r_id);
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->consultation_type = $request->consultation_type;
        $resource->availability = $request->availability;
        $resource->note = $request->note;
        // $resource->added_by = $request->user_id;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Doctor Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceDoctor  $resourceDoctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceDoctor $resourceDoctor)
    {
        //
    }
}
