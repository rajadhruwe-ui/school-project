<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryCategory;

class GalleryController extends Controller
{
    public function publicIndex()
    {
        $categories = GalleryCategory::with('galleries')->get();
        return view('gallery.index', compact('categories'));
    }

    public function create()
    {
        $categories = GalleryCategory::all();
        return view('gallery.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:gallery_categories,id',
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $filename = $request->file('image')->store('gallery', 'public');

        Gallery::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'filename' => basename($filename),
        ]);

        return redirect()->route('gallery')->with('success', 'Image uploaded successfully.');
    }
}
