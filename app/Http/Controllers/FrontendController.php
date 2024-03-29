<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            if ($search == 'All') {
                $reqs = HelpRequest::select('id', 'user_id', 'name', 'city', 'taluka', 'items', 'needed_by')
                    ->where('reqStatus', '<>', 'Completed')
                    ->get();
            } else {
                $reqs = HelpRequest::select('id', 'user_id', 'name', 'city', 'taluka', 'items', 'needed_by')
                    ->where('reqStatus', '<>', 'Completed')
                    ->where('taluka', '=', $search)
                    ->get();
            }
        } else {
            $reqs = HelpRequest::select('id', 'user_id', 'name', 'city', 'taluka', 'items', 'needed_by')
                ->where('reqStatus', '<>', 'Completed')
                ->get();
            $search = null;
        }
        return view('frontend.viewrequests', compact('reqs', 'search'));
    }

    public function createreq()
    {
        return view('frontend.createrequest');
    }

    public function myrequests()
    {
        return view('frontend.myrequest');
    }

    public function deletemyrequest(Request $request)
    {
        // dd($request);
        $req = HelpRequest::find($request->req_id);
        // dd($req);
        $req->delete();
        return redirect()->back()->with('status', 'Deleted Successfully');
    }

    public function editmyrequest(Request $request)
    {
        $req = HelpRequest::find($request->req_id);
        // dd($req);
        return view('frontend.updatemyrequest', compact('req'));
    }

    public function updatemyrequest(Request $request)
    {
        // dd($request);
        // //dd($request);
        // $request->validate([
        //     'name' => 'required',
        //     'phone' => 'required',
        //     'taluka' => 'required',
        //     'city' => 'required',
        //     'address' => 'required',
        //     'pincode' => 'nullable',
        //     'needed_by' => 'required',
        //     'special_instructions' => 'nullable',
        // ]);

        $helpRequest = HelpRequest::find($request->req_id);
        $helpRequest->name = $request->name;
        $helpRequest->phone = $request->phone;
        $helpRequest->address = $request->address;
        $helpRequest->taluka = $request->taluka;
        $helpRequest->city = $request->city;
        $helpRequest->pincode = $request->pincode;
        $helpRequest->needed_by = $request->needed_by;
        $helpRequest->special_instructions = $request->special_instructions;
        $helpRequest->items = json_encode($request->items);

        // dd($helpRequest);
        $helpRequest->update();
        return redirect('/myrequests')->with('status', 'Request Updated Successfully');
    }

    public function completed(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->search;
            if ($search == 'All') {
                $reqs = HelpRequest::select('id', 'vol_id', 'city', 'taluka', 'items', 'needed_by', 'updated_at')
                    ->where('reqStatus', '=', 'Completed')
                    ->get();
            } else {
                $reqs = HelpRequest::select('id', 'vol_id', 'city', 'taluka', 'items', 'needed_by', 'updated_at')
                    ->where('reqStatus', '=', 'Completed')
                    ->where('taluka', '=', $search)
                    ->get();
            }
        } else {
            $reqs = HelpRequest::select('id', 'vol_id', 'city', 'taluka', 'items', 'needed_by', 'updated_at')
                ->where('reqStatus', '=', 'Completed')
                ->get();
            $search = null;
        }
        return view('frontend.completedrequests', compact('reqs', 'search'));
    }

    public function displayteam()
    {
        return view('frontend.team.index');
    }
}
