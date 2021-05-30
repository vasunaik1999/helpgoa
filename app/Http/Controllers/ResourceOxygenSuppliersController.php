<?php

namespace App\Http\Controllers;

use App\Models\ResourceOxygenSuppliers;
use Illuminate\Http\Request;

class ResourceOxygenSuppliersController extends Controller
{
    public function frontendview()
    {
        $resources = ResourceOxygenSuppliers::where('visibility', '=', '1')->get();
        return view('frontend.resources.oxygen.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceOxygenSuppliers::all();
        return view('frontend.resources.oxygen.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.oxygen.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = new ResourceOxygenSuppliers();
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->supply_type = $request->supply_type;
        $resource->supplier_address = $request->supplier_address;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "0";
        $resource->save();
        return redirect()->back()->with('status', 'Oxygen Suppliers Details Added Successfully');
    }

    public function show(ResourceOxygenSuppliers $resourceOxygenSuppliers)
    {
        //
    }

    public function edit(ResourceOxygenSuppliers $resourceOxygenSuppliers)
    {
        $resource = $resourceOxygenSuppliers;
        return view('frontend.resources.oxygen.edit', compact('resource'));
    }

    public function update(Request $request, ResourceOxygenSuppliers $resourceOxygenSuppliers)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = ResourceOxygenSuppliers::find($request->r_id);
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->service_location = $request->service_location;
        $resource->supply_type = $request->supply_type;
        $resource->supplier_address = $request->supplier_address;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Oxygen Suppliers Details Updated Successfully');
    }


    public function destroy(ResourceOxygenSuppliers $resourceOxygenSuppliers)
    {
        //
    }
}
