<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function publicIndex()
    {
        $files = Storage::files('public/gallery');
        $images = array_map(fn($file) => str_replace('public/gallery/', '', $file), $files);

        return view('gallery', compact('images'));
    }
}
