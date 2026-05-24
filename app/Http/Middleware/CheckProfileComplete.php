<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckProfileComplete
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && auth()->user()->role === 'user') {
            // Check if profile exists
            if (!auth()->user()->profile) {
                return redirect()->route('profile.complete')
                    ->with('warning', 'Please complete your profile to continue.');
            }
            
            // Check if required fields are filled
            $profile = auth()->user()->profile;
            $requiredFields = ['gender', 'looking_for', 'age', 'religion', 'city'];
            
            $isComplete = true;
            foreach ($requiredFields as $field) {
                if (empty($profile->$field)) {
                    $isComplete = false;
                    break;
                }
            }
            
            if (!$isComplete) {
                return redirect()->route('profile.complete')
                    ->with('warning', 'Please complete all required fields in your profile.');
            }
        }
        
        return $next($request);
    }
}