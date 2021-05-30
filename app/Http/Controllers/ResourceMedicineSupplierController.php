<?php

namespace App\Http\Controllers;

use App\Models\ResourceMedicineSupplier;
use Illuminate\Http\Request;

class ResourceMedicineSupplierController extends Controller
{

    public function frontendview()
    {
        $resources = ResourceMedicineSupplier::where('visibility', '=', '1')->get();
        return view('frontend.resources.medicine.front-view', compact('resources'));
    }

    public function index()
    {
        $resources = ResourceMedicineSupplier::all();
        return view('frontend.resources.medicine.index', compact('resources'));
    }

    public function create()
    {
        return view('frontend.resources.medicine.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = new ResourceMedicineSupplier();
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->supplier_location = $request->supplier_location;
        $resource->delivery_status = $request->delivery_status;
        $resource->note = $request->note;
        $resource->added_by = $request->user_id;
        $resource->visibility = "1";
        $resource->verified = "0";
        $resource->save();
        return redirect()->back()->with('status', 'Medicine Supplier Details Added Successfully');
    }

    public function show(ResourceMedicineSupplier $resourceMedicineSupplier)
    {
        //
    }

    public function edit(ResourceMedicineSupplier $resourceMedicineSupplier)
    {
        $resource = $resourceMedicineSupplier;
        return view('frontend.resources.medicine.edit', compact('resource'));
    }

    public function update(Request $request, ResourceMedicineSupplier $resourceMedicineSupplier)
    {
        $request->validate([
            'provider' => 'required',
        ]);

        $resource = ResourceMedicineSupplier::find($request->r_id);
        $resource->provider = $request->provider;
        $resource->contact = $request->contact;
        $resource->supplier_location = $request->supplier_location;
        $resource->delivery_status = $request->delivery_status;
        $resource->note = $request->note;
        $resource->visibility = $request->visibility;
        $resource->verified = $request->verified;
        // dd($resource);
        $resource->update();

        return redirect()->back()->with('status', 'Medicine Supplier Details Updated Successfully');
    }
    
    public function destroy(ResourceMedicineSupplier $resourceMedicineSupplier)
    {
        //
    }
}
