<?php

namespace App\Http\Controllers;

use App\Models\ResourceIsolationCenter;
use Illuminate\Http\Request;

class ResourceIsolationCenterController extends Controller
{

    public function frontendview()
    {
        $resources = ResourceIsolationCenter::where('visibility', '=', '1')->get();
        return view('frontend.resources.isolation-center.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceIsolationCenter::all();
        return view('frontend.resources.isolation-center.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.isolation-center.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $resource = new ResourceIsolationCenter();
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->address = $request->address;
        $resource->type = $request->type;
        $resource->isPaid = $request->isPaid;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "1";
        $resource->save();
        return redirect()->back()->with('status', 'Isolation Centers Details Added Successfully');
    }

    public function show(ResourceIsolationCenter $resourceIsolationCenter)
    {
        //
    }

    public function edit(ResourceIsolationCenter $resourceIsolationCenter)
    {
        $resource =  $resourceIsolationCenter;
        return view('frontend.resources.isolation-center.edit', compact('resource'));
    }

    public function update(Request $request, ResourceIsolationCenter $resourceIsolationCenter)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $resource = ResourceIsolationCenter::find($request->r_id);
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->address = $request->address;
        $resource->type = $request->type;
        $resource->isPaid = $request->isPaid;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Isolation Center Details Updated Successfully');
    }


    public function destroy(ResourceIsolationCenter $resourceIsolationCenter)
    {
        //
    }
}
