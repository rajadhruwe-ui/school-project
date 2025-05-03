<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InfrastructureController extends Controller
{
    public function publicIndex()
    {
        return view('infrastructure');
    }
}
