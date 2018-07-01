<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EnrollmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $enrollment = DB::table('enrollments')->join('students', 'students.id', '=', 'enrollments.id_student')->join('courses', 'courses.id', '=', 'enrollments.id_course')->select('students.name','courses.name', 'enrollments.*')->get();


        return view('admin/student', ['enrollment' => $enrollment]);
    }
}
