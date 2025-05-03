<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admission;

class AdmissionController extends Controller
{
    public function publicIndex()
    {
        return view('admission');
    }

    public function submit(Request $request)
    {
        $validated = $request->validate([
            'student_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'parent_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Admission::create($validated);

        return redirect()->back()->with('success', 'Admission form submitted successfully!');
    }
}
