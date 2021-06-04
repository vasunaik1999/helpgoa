<?php

namespace App\Http\Controllers;

use App\Models\VisitorTracker;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;

class VisitorTrackerController extends Controller
{
    public function index(Request $request)
    {
        DB::table('visitor_trackers')->increment('visitors');
        $this->Cookiecheck($request);
        return view('frontend.home');
        // $c = VisitorTracker::all();
        // dd($c);
    }

    public function Cookiecheck($request)
    {
        $value = Cookie::get('chg_visitor');
        if ($value == null) {
            $time = 525600;
            Cookie::queue('chg_visitor', 'visitor', $time);
            DB::table('visitor_trackers')->increment('unique_visitors');
        } else {
        }
    }
}
