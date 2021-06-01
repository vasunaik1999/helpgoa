<?php

namespace App\Http\Controllers;

use App\Models\ResourceHospital;
use Illuminate\Http\Request;

class ResourceHospitalController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceHospital::where('visibility', '=', '1')->get();
        return view('frontend.resources.hospital.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceHospital::all();
        return view('frontend.resources.hospital.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.hospital.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'provider' => 'required',
        ]);

        $resource = new ResourceHospital();
        $resource->name = $request->name;
        $resource->type = $request->type;
        $resource->bed_types = $request->bed_types;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->location_url = $request->location_url;
        $resource->address = $request->address;
        $resource->nodal_officer_name = $request->nodal_officer_name;
        $resource->nodal_officer_phone = $request->nodal_officer_phone;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "1";
        $resource->save();
        return redirect()->back()->with('status', 'Hospital Details Added Successfully');
    }

    public function show(ResourceHospital $resourceHospital)
    {
        //
    }

    public function edit(ResourceHospital $resourceHospital)
    {
        $resource = $resourceHospital;
        return view('frontend.resources.hospital.edit', compact('resource'));
    }

    public function update(Request $request, ResourceHospital $resourceHospital)
    {
        $request->validate([]);

        $resource = ResourceHospital::find($request->r_id);
        $resource->name = $request->name;
        $resource->type = $request->type;
        $resource->bed_types = $request->bed_types;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->location_url = $request->location_url;
        $resource->address = $request->address;
        $resource->nodal_officer_name = $request->nodal_officer_name;
        $resource->nodal_officer_phone = $request->nodal_officer_phone;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Hospital Details Updated Successfully');
    }

    public function destroy(ResourceHospital $resourceHospital)
    {
        //
    }
}
