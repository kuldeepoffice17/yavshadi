<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MatchController extends Controller
{
    // ❌ constructor middleware हटा दिया — Laravel 12 compatible नहीं

    public function index(Request $request)
    {
        $query = User::with('profile')
            ->where('role', 'user')
            ->whereHas('profile'); // सिर्फ वो users जिनका profile complete है

        // अगर login है तो खुद को exclude करें
        if (Auth::check()) {
            $query->where('id', '!=', Auth::id());
        }

        // ── Filters ──────────────────────────────────────────
        if ($request->filled('looking_for')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('looking_for', $request->looking_for);
            });
        }

        if ($request->filled('religion')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('religion', 'like', '%' . $request->religion . '%');
            });
        }

        if ($request->filled('city')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('city', 'like', '%' . $request->city . '%');
            });
        }

        if ($request->filled('state')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('state', 'like', '%' . $request->state . '%');
            });
        }

        if ($request->filled('country')) {
            $query->whereHas('profile', function ($q) use ($request) {
                $q->where('country', 'like', '%' . $request->country . '%');
            });
        }

        if ($request->filled('age')) {
            $parts = explode('-', $request->age);
            if (count($parts) === 2) {
                $query->whereHas('profile', function ($q) use ($parts) {
                    $q->whereBetween('age', [(int)$parts[0], (int)$parts[1]]);
                });
            }
        }

        $matches = $query->paginate(12)->withQueryString();

        return view('matches.index', compact('matches'));
    }

    public function search(Request $request)
    {
        return $this->index($request);
    }

    public function sendInterest($id)
    {
        // आगे implement करें
        return back()->with('success', 'Interest भेज दी गई!');
    }

    public function acceptInterest($id)
    {
        return back()->with('success', 'Interest accept हो गई!');
    }

    public function interests()
    {
        return view('matches.interests');
    }
}