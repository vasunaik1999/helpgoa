<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use App\Models\Reason;
use App\Models\User;
use App\Models\WarriorDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\Types\Null_;
use PhpParser\Node\Stmt\Else_;

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
            'reqStatus' => 'required',
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
        $helpRequest->reqStatus = $request->input('reqStatus');
        $helpRequest->special_instructions = $request->input('special_instructions');
        $helpRequest->items = json_encode($request->input('items'));
        $helpRequest->order_otp = rand(1000, 9999);
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
    public function manageRequest(Request $request)
    {
        $reqs = HelpRequest::orderBy('id', 'desc')->get();
        //dd($reqs);
        return view('request.managerequests', compact('reqs'));
        // return view('request.viewrequests')->with('reqs', json_decode($reqs, true));
    }

    public function show(Request $request)
    {
        $flag = 0;
        if ($request->has('search')) {
            $search = $request->search;
            if ($search == 'All') {
                $reqs = HelpRequest::select('id', 'user_id', 'name', 'city', 'taluka', 'items', 'needed_by')
                    ->where('reqStatus', '<>', 'Completed')
                    ->get();
            } elseif ($search == 'My Areas') {
                $flag = 1;
            } else {
                $reqs = HelpRequest::select('id', 'user_id', 'name', 'city', 'taluka', 'items', 'needed_by')
                    ->where('reqStatus', '<>', 'Completed')
                    ->where('taluka', '=', $search)
                    ->get();
            }
        } else {
            $flag = 1;
            // $reqs = HelpRequest::select('id', 'name', 'user_id', 'city', 'taluka', 'items', 'needed_by')
            //     ->where('reqStatus', '<>', 'Completed')
            //     ->get();
        }

        if ($flag == 1) {
            //Start
            $user_id = Auth::user()->id;
            $w_loc = WarriorDetail::select('serviceAreas')->where('user_id', '=', $user_id)->first();

            $count = 0;
            $requests = array();
            foreach (json_decode($w_loc->serviceAreas) as $taluka) {
                $requests[$count++] = HelpRequest::where('taluka', '=', $taluka)
                    ->where('reqStatus', '<>', 'Completed')
                    ->get();
            }
            $reqs = array();
            foreach ($requests as $req) {
                foreach ($req as $r) {
                    $reqs[] = $r;
                }
            }
            $search = 'My Areas';
            //End
        }
        return view('request.viewrequest', compact('reqs', 'search'));
    }

    public function view($helpRequest)
    {
        $req = HelpRequest::find($helpRequest);
        //dd($req);
        $user = NULL;
        if ($req->vol_id == NULL) {
        } else {
            $user = User::find($req->vol_id);
        }
        //dd($user);
        return view('request.checkrequest', compact('req', 'user'));
    }

    public function acceptRequest($helpRequest, $user)
    {
        $req = HelpRequest::find($helpRequest);
        if ($req->vol_id == Null) {
            $req->vol_id = $user;
            $req->reqStatus = 'Accepted';
        } else {
            return redirect()->back()->with('message', 'Request Already Accepted by Someone else');
        }
        //dd($req);
        $req->update();
        return redirect()->back()->with('status', 'Accepted Successfully');
    }

    public function declineRequest(Request $request, $helpRequest, $user)
    {

        // dd($helpRequest, $user, $request->reason);
        $request->validate([
            'reason' => 'required',
        ]);

        $req = HelpRequest::find($helpRequest);
        if ($req->vol_id == Null) {
            return redirect()->back();
        } else {
            $req->vol_id = NULL;
            $req->reqStatus = 'Open';
            $reason = new Reason();
            $reason->user_id = $user;
            $reason->request_id = $helpRequest;
            $reason->reason = $request->reason;
            $reason->save();
            // dd($reason);
        }
        // dd($req);
        $req->update();
        return redirect()->back()->with('status', 'Request Declined');
    }

    public function requestCompleted(Request $request)
    {
        $request->validate([
            'order_otp' => 'required',
        ]);

        $req = HelpRequest::find($request->req_id);
        if ($req->order_otp == $request->order_otp) {
            $req->reqStatus = 'Completed';
            $req->vol_id = $request->user_id;
            $req->update();
            return redirect()->back()->with('status', 'Congratulations!! You have completed this request, Stay Safe!');
        } else {
            return redirect()->back()->with('message', 'Oops!! The OTP you entered does not match! Please ask to user to confirm the OTP again.');
        }
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
