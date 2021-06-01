<?php

namespace App\Http\Controllers;

use App\Models\ResourceCovidTesting;
use Illuminate\Http\Request;

class ResourceCovidTestingController extends Controller
{

    public function frontendview()
    {
        $resources = ResourceCovidTesting::where('visibility', '=', '1')->get();
        return view('frontend.resources.covid-testing.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceCovidTesting::all();
        return view('frontend.resources.covid-testing.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.covid-testing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = new ResourceCovidTesting();
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->collection = $request->collection;
        $resource->type = $request->type;
        $resource->time = $request->time;
        $resource->working_days = $request->working_days;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "1";
        $resource->save();
        return redirect()->back()->with('status', 'Covid Testing Center Added Successfully');
    }

    public function show(ResourceCovidTesting $resourceCovidTesting)
    {
        //
    }

    public function edit(ResourceCovidTesting $resourceCovidTesting)
    {
        $resource = $resourceCovidTesting;
        return view('frontend.resources.covid-testing.edit', compact('resource'));
    }

    public function update(Request $request, ResourceCovidTesting $resourceCovidTesting)
    {
        $request->validate([
            // 'name' => 'required',
            // 'contact' => 'nullable|digits:10',
        ]);

        $resource = ResourceCovidTesting::find($request->r_id);
        $resource->name = $request->name;
        $resource->contact = $request->contact;
        $resource->location = $request->location;
        $resource->collection = $request->collection;
        $resource->type = $request->type;
        $resource->time = $request->time;
        $resource->working_days = $request->working_days;
        $resource->note = $request->note;
        // $resource->added_by = $request->user_id;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Covid Testing Center Details Updated Successfully');
    }

    public function destroy(ResourceCovidTesting $resourceCovidTesting)
    {
        //
    }
}
