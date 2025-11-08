<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard', [
            'totalUsers'  => User::count(),
            'totalStaff'  => User::where('role', 'staff')->count(),
            'totalAdmin'  => User::where('role', 'admin')->count(),
        ]);
    }

    public function staff()
    {
        return view('staff.dashboard', [
            'totalUsers'  => User::count(),
            'totalStaff'  => User::where('role', 'staff')->count(),
            'totalAdmin'  => User::where('role', 'admin')->count(),
        ]);
    }

    public function user()
    {
        return view('user.dashboard', [
            'totalUsers'  => User::count(),
            'totalStaff'  => User::where('role', 'staff')->count(),
            'totalAdmin'  => User::where('role', 'admin')->count(),
        ]);
    }
}
