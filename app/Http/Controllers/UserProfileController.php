<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function index()
    {
        $profile = Auth::user()->profile;
        return view('user.profile.index', compact('profile'));
    }

    public function create()
    {
        return view('user.profile.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'biodata' => 'required'
        ]);

        Profile::create([
            'user_id' => Auth::id(),
            'age' => $request->age,
            'biodata' => $request->biodata,
        ]);
        return redirect()->route('user.profile.index')
    ->with('success', 'Berhasil Buat Profile');

        return redirect()->route('user.profile.index')
    ->with('success', 'Update Profile Berhasil');

        
    }

    public function edit()
    {
        $profile = Auth::user()->profile;
        return view('user.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'age' => 'required|numeric',
            'biodata' => 'required'
        ]);

        $profile = Auth::user()->profile;

        $profile->update([
            'age' => $request->age,
            'biodata' => $request->biodata,
        ]);

        return redirect()->route('user.profile')
            ->with('success', 'Update Profile Berhasil');
    }
}
