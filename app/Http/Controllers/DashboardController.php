<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth::user()->hasRole('user')) {
            return view('dashboard.userdashboard');
        } else if (Auth::user()->hasRole('warrior')) {
            return view('dashboard.warriordashboard');
        } else if (Auth::user()->hasRole('admin')) {
            return view('dashboard.admindashboard');
        } else if (Auth::user()->hasRole('superadmin')) {
            return view('dashboard.superadmindashboard');
        }
    }

    public function myprofile()
    {
        return view('profile.myprofile');
    }
}
