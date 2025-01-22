<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function index()
    {
        $images = Auth::user()->images;
        return view('dashboard.gallery.index', compact('images'));
    }

    public function create()
    {
        return view('dashboard.gallery.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $path = $request->file('file')->store('images', 'public');

        Auth::user()->images()->create([
            'title' => $request->title,
            'file_path' => $path,
        ]);

        return redirect()->route('dashboard.gallery.index')->with('success', 'Image uploaded successfully.');
    }

    public function destroy(Image $image)
    {
        if ($image->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('public')->delete($image->file_path);
        $image->delete();

        return redirect()->route('dashboard.gallery.index')->with('success', 'Image deleted successfully.');
    }
}