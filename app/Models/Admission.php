<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admission extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_name',
        'date_of_birth',
        'parent_name',
        'email',
        'phone',
        'address',
    ];
}
