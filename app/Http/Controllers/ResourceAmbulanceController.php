<?php

namespace App\Http\Controllers;

use App\Models\ResourceAmbulance;
use Illuminate\Http\Request;

class ResourceAmbulanceController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceAmbulance::where('visibility', '=', '1')->get();
        return view('frontend.resources.ambulance.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceAmbulance::all();
        return view('frontend.resources.ambulance.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.ambulance.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = new ResourceAmbulance();
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->ambulance_type = $request->ambulance_type;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "0";
        $resource->save();
        return redirect()->back()->with('status', 'Ambulance Details Added Successfully');
    }

    public function show(ResourceAmbulance $resourceAmbulance)
    {
        //
    }

    public function edit(ResourceAmbulance $resourceAmbulance)
    {
        $resource = $resourceAmbulance;
        return view('frontend.resources.ambulance.edit', compact('resource'));
    }

    public function update(Request $request, ResourceAmbulance $resourceAmbulance)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = ResourceAmbulance::find($request->r_id);
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->ambulance_type = $request->ambulance_type;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Ambulance Details Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ResourceAmbulances  $resourceAmbulances
     * @return \Illuminate\Http\Response
     */
    public function destroy(ResourceAmbulance $resourceAmbulance)
    {
        //
    }
}
