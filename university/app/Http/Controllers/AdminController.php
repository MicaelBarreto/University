<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Course;
use App\Student;
use App\Enrollment;

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

        \Session::flash('status', 'Course Deleted With Success');
        return redirect('/admin/courses');
    }

    public function enrollmentIndex()
    {

        $enrollment = DB::table('enrollments')
            ->join('students', 'enrollments.id_student', '=', 'students.id')
            ->join('courses', 'enrollments.id_course', '=', 'courses.id')
            ->select('courses.name as course_name', 'students.name as student_name', 'enrollments.*')->get();


        return view('admin/enrollments.index', ['enrollment' => $enrollment]);
    }

    public function enrollmentNew()
    {

        $courses = DB::table('courses')->select('*')->get();
        $students = DB::table('students')->select('*')->get();

        return view('admin/enrollments.new', ['courses' => $courses], ['students' => $students]);
    }

    public function enrollmentStore(Request $request) 
    {
        $p = new Enrollment;
        $p->id_student = $request->input('id_student');
        $p->authorization = 1;
        $p->id_course = $request->input('id_course');
        
        if ($p->save()) {
            \Session::flash('status', 'Enrollment Registred With Sucess');
            return redirect('/admin/enrollment');
        } else {
            \Session::flash('status', 'There Was an Error');
            return view('admin/enrollments/new');
        }
    }


    public function enrollmentAuthorize($id)
    {
        $p = Enrollment::findOrFail($id);
        $p->authorization = 1;
            
        if ($p->save()) {
            \Session::flash('status', 'Enrollment Authorizade With Success');
            return redirect('/admin/enrollment');
        } else {
            \Session::flash('status', 'There was an Error');
                return view('admin/courses/edit', ['enrollments' => $p]);
        }
 
    }

    public function enrollmentEdit($id) 
    {
        $row = DB::table('enrollments')
            ->join('students', 'enrollments.id_student', '=', 'students.id')
            ->join('courses', 'enrollments.id_course', '=', 'courses.id')
            ->select('courses.name as course_name', 'students.name as student_name', 'enrollments.*')
            ->where('enrollments.id', '=', $id)->get();

        $courses = DB::table('courses')->select('*')->get();
        $students = DB::table('students')->select('*')->get();

        


        return view('admin/enrollments.edit', ['row' => $row, 'courses' => $courses, 'students' => $students]);
    }

    public function enrollmentUpdate(Request $request) 
    {
        $id = $request->input('id');
        $p = Enrollment::findOrFail($id);
        $p->id_student = $request->input('id_student');
        $p->id_course = $request->input('id_course');
        $p->authorization = 1;
        
        if ($p->save()) {
            \Session::flash('status', 'Enrollment Update With Success');
            return redirect('/admin/enrollment');
        } else {
            \Session::flash('status', 'There was an Error');
            return view('admin/enrollments/edit', ['enrollments' => $p]);
        }
    }

    public function enrollmentDelete($id) 
    {
        $p = Enrollment::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Enrollment Deleted With Success');
        return redirect('/admin/enrollment');
    }



}
