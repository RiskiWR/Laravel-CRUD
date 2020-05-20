<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;
use App\Hobby;
use App\Grade;
use App\Major;



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
        $student = Student::all();
        $grade = Grade::all();
        $major = Major::all();
        $hobby = Hobby::all();
        return view('home' , compact('student','grade','major','hobby'));
    }
    public function auth()
    {
        return view('welcome');
    }
}
