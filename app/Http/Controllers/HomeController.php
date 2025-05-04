<?php

namespace App\Http\Controllers;
use App\Models\Visitor;
use App\Models\Visit;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $totalVisitors = Visitor::count();
        $totalVisits = Visit::count();

        return view('welcome', compact('totalVisitors', 'totalVisits'));
        
    }
}
