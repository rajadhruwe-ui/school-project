<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function publicIndex()
{
    $teamMembers = [
        (object)[
            'name' => 'Mr. Ramesh Sharma',
            'position' => 'Principal',
            'bio' => '20+ years of experience in school leadership.',
            'photo' => 'team/principal.jpg', // Stored in storage/app/public/team/
        ],
        (object)[
            'name' => 'Mrs. Sunita Verma',
            'position' => 'Math Teacher',
            'bio' => 'Loves teaching with real-world examples.',
            'photo' => 'team/math_teacher.jpg',
        ],
        (object)[
            'name' => 'Mr. Ajay Kumar',
            'position' => 'Science Teacher',
            'bio' => 'Passionate about STEM education.',
            'photo' => 'team/science_teacher.jpg',
        ],
    ];

    return view('team', compact('teamMembers'));
}

}
