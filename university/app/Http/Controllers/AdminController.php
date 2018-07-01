<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Student;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('/admin.index');
    }
    public function courseIndex()
    {

        $course = DB::table('courses')->select('courses.id','courses.name' ,'courses.menu', 'courses.students_amount')->get();

        return view('admin/courses.index', ['courses' => $course]);
    }

    public function studentIndex()
    {

        $student = DB::table('students')->join('users', 'users.id', '=', 'students.id_user')->select('students.*', 'users.email')->get();

        return view('admin/student.index', ['student' => $student]);
    }

    public function courseStore(Request $request) 
    {
        $p = new course;
        $p->name = $request->input('name');
        $p->menu = $request->input('menu');
        $p->students_amount = $request->input('student_amount');
        
        if ($p->save()) {
            \Session::flash('status', 'Course Registred With Sucess');
            return redirect('/admin/courses');
        } else {
            \Session::flash('status', 'There Was an Error');
            return view('admin/courses/new');
        }
    }

    public function courseEdit($id) 
    {
        $courses = Course::findOrFail($id);

        return view('admin/courses.edit', ['course' => $courses]);
    }

    public function courseUpdate(Request $request) 
    {
        $id = $request->input('id');
        $p = Course::findOrFail($id);
        $p->name = $request->input('name');
        $p->menu = $request->input('menu');
        $p->students_amount = $request->input('student_amount');
        
        if ($p->save()) {
            \Session::flash('status', 'Course Update With Success');
            return redirect('/admin/courses');
        } else {
            \Session::flash('status', 'There was an Error');
            return view('admin/courses/edit', ['courses' => $p]);
        }
    }

    public function courseDelete($id) 
    {
        $p = Course::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Student Deleted With Success');
        return redirect('/admin/courses');
    }

}
