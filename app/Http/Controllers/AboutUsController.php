<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    public function publicView()

    {
        return view('about-public');
    }
}
