<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class AttendanceController extends Controller
{
    public function print()
    {
        $children = Child::all(); // Fetch all children

        return view('attendance', compact('children'));
    }
}