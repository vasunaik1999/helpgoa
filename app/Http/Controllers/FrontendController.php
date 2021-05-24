<?php

namespace App\Http\Controllers;

use App\Models\HelpRequest;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $reqs = HelpRequest::all();
        return view('frontend.viewrequests', compact('reqs'));
    }

    public function createreq()
    {
        return view('frontend.createrequest');
    }
}
