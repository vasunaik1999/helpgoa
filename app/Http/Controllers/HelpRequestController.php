<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;

class HelpRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('request.createrequest');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'taluka' => 'required',
            'city' => 'required',
            'address' => 'required',
            'pincode' => 'nullable',
            'needed_by' => 'required',
            'special_instructions' => 'nullable',
            'status' => 'required',
        ]);

        $helpRequest = new HelpRequest();
        $helpRequest->user_id = $request->input('user_id');
        $helpRequest->name = $request->input('name');
        $helpRequest->phone = $request->input('phone');
        $helpRequest->address = $request->input('address');
        $helpRequest->taluka = $request->input('taluka');
        $helpRequest->city = $request->input('city');
        $helpRequest->pincode = $request->input('pincode');
        $helpRequest->needed_by = $request->input('needed_by');
        $helpRequest->status = $request->input('status');
        $helpRequest->special_instructions = $request->input('special_instructions');
        $helpRequest->items = json_encode($request->input('items'));
        $helpRequest->urgency_status = 'urgent';
        //dd($helpRequest);

        $helpRequest->save();
        return redirect()->back()->with('status', 'Request Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $reqs = HelpRequest::all();
        //dd($reqs);
        return view('request.viewrequests', compact('reqs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
