<?php

namespace App\Http\Controllers;

use App\Models\UserProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileCompleteController extends Controller
{
    public function create()
    {
        $profile = Auth::user()->profile;
        return view('profile.complete', compact('profile'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'gender' => 'required|in:male,female',
            'looking_for' => 'required|in:bride,groom',
            'age' => 'required|integer|min:18|max:100',
            'religion' => 'required|string|max:50',
            'city' => 'required|string|max:100',
            'education' => 'required|string|max:100',
            'occupation' => 'required|string|max:100',
            'annual_income' => 'nullable|string|max:50',
            'about_me' => 'nullable|string|max:1000',
            'marital_status' => 'nullable|string|max:50',
            'height' => 'nullable|string|max:20',
            'mother_tongue' => 'nullable|string|max:50',
        ]);
        
        // Create or update profile
        UserProfile::updateOrCreate(
            ['user_id' => Auth::id()],
            $request->all()
        );
        
        // After profile completion, redirect to dashboard
        return redirect()->route('dashboard')
            ->with('success', 'आपकी प्रोफाइल सफलतापूर्वक पूरी हो गई! अब आप अपना जीवनसाथी ढूंढ सकते हैं।');
    }
    
    public function show()
    {
        $profile = Auth::user()->profile;
        $user = Auth::user();
        return view('profile.show', compact('profile', 'user'));
    }
}