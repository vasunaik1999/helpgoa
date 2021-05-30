<?php

namespace App\Http\Controllers;

use App\Models\ResourceFoodServices;
use Illuminate\Http\Request;

class ResourceFoodServicesController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceFoodServices::where('visibility', '=', '1')->get();
        return view('frontend.resources.food.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceFoodServices::all();
        return view('frontend.resources.food.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.food.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = new ResourceFoodServices();
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_area = $request->service_area;
        $resource->food_type = $request->food_type;
        $resource->meal_type = $request->meal_type;
        $resource->delivery_to = $request->delivery_to;
        $resource->isPaid = $request->isPaid;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "0";
        $resource->verified = "0";
        $resource->save();
        return redirect()->back()->with('status', 'Food Service Details Added Successfully');
    }

    public function show(ResourceFoodServices $resourceFoodServices)
    {
        //
    }

    public function edit(ResourceFoodServices $resourceFoodServices)
    {
        $resource = $resourceFoodServices;
        return view('frontend.resources.food.edit', compact('resource'));
    }

    public function update(Request $request, ResourceFoodServices $resourceFoodServices)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = ResourceFoodServices::find($request->r_id);
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_area = $request->service_area;
        $resource->food_type = $request->food_type;
        $resource->meal_type = $request->meal_type;
        $resource->delivery_to = $request->delivery_to;
        $resource->isPaid = $request->isPaid;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Food service Details Updated Successfully');
    }

    public function destroy(ResourceFoodServices $resourceFoodServices)
    {
        //
    }
}
