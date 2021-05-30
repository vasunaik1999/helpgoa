<?php

namespace App\Http\Controllers;

use App\Models\ResourceCaretakingServices;
use Illuminate\Http\Request;

class ResourceCaretakingServicesController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceCaretakingServices::where('visibility', '=', '1')->get();
        return view('frontend.resources.caretaker.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceCaretakingServices::all();
        return view('frontend.resources.caretaker.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.caretaker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = new ResourceCaretakingServices();
        $resource->service_provider = $request->service_provider;
        $resource->contact = $request->contact;
        $resource->serviced_areas = $request->serviced_areas;
        $resource->service_genders = $request->service_genders;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "0";
        $resource->save();
        return redirect()->back()->with('status', 'Caretaker Added Successfully');
    }

    public function show(ResourceCaretakingServices $resourceCaretakingServices)
    {
        //
    }

    public function edit(ResourceCaretakingServices $resourceCaretakingServices)
    {
        $resource = $resourceCaretakingServices;
        return view('frontend.resources.caretaker.edit', compact('resource'));
    }

    public function update(Request $request, ResourceCaretakingServices $resourceCaretakingServices)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = ResourceCaretakingServices::find($request->r_id);
        $resource->service_provider = $request->service_provider;
        $resource->contact = $request->contact;
        $resource->serviced_areas = $request->serviced_areas;
        $resource->service_genders = $request->service_genders;
        $resource->note = $request->note;
        // $resource->added_by = $request->user_id;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Caretaker Details Updated Successfully');
    }


    public function destroy(ResourceCaretakingServices $resourceCaretakingServices)
    {
        //
    }
}
