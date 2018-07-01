<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $course = DB::table('courses')->select('id','name' ,'menu', 'students_amount')->get();

        return view('/courses.index', ['courses' => $course]);
    }

    public function StudentIndex()
    {

        $course = DB::table('courses')->select('id','name' ,'menu', 'students_amount')->get();

        return view('student.courses', ['courses' => $course]);
    }

}
