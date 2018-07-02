<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Student;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $course = Course::paginate(5);

        return view('/courses.index', ['courses' => $course]);
    }

    public function StudentIndex()
    {

        $course = Course::paginate(5);

        return view('student.courses', ['courses' => $course]);
    }

}
