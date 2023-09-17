<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        if (auth()->user()->type == 'patient') {
            return redirect('patient');
        } else if (auth()->user()->type == 'doctor') {
            return redirect('doctor');
        }
        abort(403);
    }



}
