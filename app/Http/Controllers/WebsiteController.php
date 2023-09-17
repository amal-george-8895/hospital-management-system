<?php

namespace App\Http\Controllers;

use App\Models\Department;

class WebsiteController extends Controller
{
    public function index()
    {
        $departments = Department::all();

        return view('home', compact('departments'));
    }

    public function doctorsList($departmentID)
    {
        $department = Department::where('id', $departmentID)->with('doctors')->first();
        $doctors    = $department->doctors;

        return view('doctor.list', compact('doctors'));
    }
}
