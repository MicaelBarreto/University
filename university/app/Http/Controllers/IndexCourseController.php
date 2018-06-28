<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;

class IndexCourseController extends Controller
{
    public function index()
    {

        $course = DB::table('courses')->select('courses.id','courses.name' ,'courses.menu', 'courses.students_amount')->get();

        return view('/courses.index', ['courses' => $course]);
    }

}
