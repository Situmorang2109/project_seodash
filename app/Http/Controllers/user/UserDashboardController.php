<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\UserTransaction;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard', [
            'productsCount' => Product::count(),
            'transactionsCount' => UserTransaction::where('user_id', Auth::id())->count(),
        ]);
    }

    public function profile()
    {
        $profile = Profile::where('user_id', Auth::id())->first();

        return view('user.profile.index', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'age' => 'required|integer',
            'biodata' => 'required|string',
        ]);

        Profile::updateOrCreate(
            ['user_id' => Auth::id()],
            [
                'age' => $request->age,
                'biodata' => $request->biodata
            ]
        );

        return back()->with('success', 'Profile updated successfully!');
    }
}
