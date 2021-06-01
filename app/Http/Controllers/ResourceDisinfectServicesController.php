<?php

namespace App\Http\Controllers;

use App\Models\ResourceDisinfectServices;
use Illuminate\Http\Request;

class ResourceDisinfectServicesController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceDisinfectServices::where('visibility', '=', '1')->get();
        return view('frontend.resources.sanitization.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceDisinfectServices::all();
        return view('frontend.resources.sanitization.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.sanitization.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = new ResourceDisinfectServices();
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->extra_info = $request->extra_info;
        $resource->type = $request->type;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "1";
        $resource->save();
        return redirect()->back()->with('status', 'Sanitization Service Added Successfully');
    }

    public function show(ResourceDisinfectServices $resourceDisinfectServices)
    {
        //
    }

    public function edit(ResourceDisinfectServices $resourceDisinfectServices)
    {
        $resource = $resourceDisinfectServices;
        return view('frontend.resources.sanitization.edit', compact('resource'));
    }

    public function update(Request $request, ResourceDisinfectServices $resourceDisinfectServices)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = ResourceDisinfectServices::find($request->r_id);
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->note = $request->note;
        $resource->extra_info = $request->extra_info;
        $resource->type = $request->type;
        // $resource->added_by = $request->user_id;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Sanitization Service Details Updated Successfully');
    }

    public function destroy(ResourceDisinfectServices $resourceDisinfectServices)
    {
        //
    }
}
