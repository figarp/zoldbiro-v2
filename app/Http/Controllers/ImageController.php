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
        $images = Image::where('user_id', Auth::id())->get();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $uploadedImages = [];
        foreach ($request->file('images') as $image) {
            $path = $image->store('images', 'public');
            $newImage = Image::create([
                'path' => $path,
                'user_id' => Auth::id(),
            ]);
            $uploadedImages[] = $newImage;
        }

        return response()->json($uploadedImages, 201);
    }

    public function delete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (!empty($ids)) {
            foreach ($ids as $id) {
                $image = Image::find($id);

                if ($image) {
                    // Ellenőrizd a fájl létezését, majd töröld
                    if (Storage::disk('public')->exists($image->path)) {
                        Storage::disk('public')->delete($image->path);
                    }
                    
                    // Kép törlése az adatbázisból
                    $image->delete();
                }
            }
        }

        return response()->json(['message' => 'Images deleted successfully']);
    }
}