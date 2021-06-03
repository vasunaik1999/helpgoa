<?php

namespace App\Http\Controllers;

use App\Models\VisitorTracker;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('frontend.home');
        } else if (Auth::user()->hasRole('warrior')) {
            return view('dashboard.warriordashboard');
        } else if (Auth::user()->hasRole('admin')) {
            return view('dashboard.admindashboard');
        } else if (Auth::user()->hasRole('superadmin')) {
            $visitors = VisitorTracker::all();
            return view('dashboard.superadmindashboard', compact('visitors'));
        }
    }

    public function myprofile()
    {
        return view('profile.myprofile');
    }
}
