<?php

namespace App\Http\Controllers;

use App\Models\Result;

class ResultsController extends Controller
{
    public function index() //this is from database so the name is index only
    {
        $results = Result::all();
        return view('results', compact('results'));
    }
}
