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

        $course = DB::table('courses')->select('courses.id','courses.name' ,'courses.menu', 'courses.students_amount')->get();

        return view('/courses.index', ['courses' => $course]);
    }

    public function StudentIndex()
    {

        $course = DB::table('courses')->select('courses.id','courses.name' ,'courses.menu', 'courses.students_amount')->get();

        return view('/student.courses', ['courses' => $course]);
    }

    public function create() 
    {
        $user = User::all();
        return view('student/register');
    }

    public function store(Request $request) 
    {
        $p = new student;
        $p->name = $request->input('name');
        $p->CPF = $request->input('CPF');
        $p->RG = $request->input('RG');
        $p->address = $request->input('address');
        $p->cellphone = $request->input('cellphone');
        
        if ($p->save()) {
            \Session::flash('status', 'Course Registred With Sucess');
            return redirect('/student');
        } else {
            \Session::flash('status', 'There Was an Error');
            return view('student.register');
        }
    }

    public function edit($id) {
        $courses = Course::findOrFail($id);

        return view('student.edit', ['courses' => $courses]);
    }

    public function delete($id) {
        $courses = Student::findOrFail($id);

        return view('student.delete', ['courses' => $courses]); 
    }

    public function update(Request $request, $id) {
        $p = Student::findOrFail($id);
        $p->name = $request->input('name');
        $p->CPF = $request->input('CPF');
        $p->RG = $request->input('RG');
        $p->address = $request->input('address');
        $p->cellphone = $request->input('cellphone');
        
        if ($p->save()) {
            \Session::flash('status', 'Student Update With Success');
            return redirect('/student');
        } else {
            \Session::flash('status', 'There was an Error');
            return view('student.edit', ['courses' => $p]);
        }
    }

    public function destroy($id) {
        $p = Student::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Student Deleted With Succes');
        return redirect('/student');
    }
}
