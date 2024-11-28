<?php

namespace App\Http\Controllers;

use App\Models\Changelog;
use Illuminate\Http\Request;

class ChangelogController extends Controller
{
    // Changelog mentése
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required',
            'change' => 'required|string|max:255',
        ]);

        Changelog::create($validated);
    }

    // Index oldal, amely kilistázza a visible szolgáltatásokat
    public function index()
    {
        $logs = Changelog::orderBy('created_at', 'desc')->get();
        return view('dashboard', compact('logs'));
    }
}
