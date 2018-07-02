<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\User;
use App\Enrollment;
use App\Course;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $student = Student::paginate(5);

        return view('student/index', ['students' => $student]);
    }

    public function create() 
    {
        return view('student/registration');
    }

    public function store(Request $request) 
    {
        $p = new student;
        $p->name = $request->input('name');
        $p->CPF = $request->input('CPF');
        $p->RG = $request->input('RG');
        $p->address = $request->input('address');
        $p->cellphone = $request->input('cellphone');
        $p->id_user = $request->input('user_id');
        
        if ($p->save()) {
            \Session::flash('status', 'Student Registred With Sucess');
            return redirect('/student');
        } else {
            \Session::flash('status', 'There Was an Error');
            return view('student.registration');
        }
    }

    //public function edit($id) {
        //$student = Student::findOrFail($id);

       // return view('student.edit', ['students' => $student]);
   // }

    public function register(Request $request) {
       
        $id = auth()->user()->id;
        $p = Student::where('id_user' ,$id)->get();

        if(!$p->isEmpty()){
            $student = Student::findOrFail($p[0]->id);
            return view('student.edit', ['student' => $student]);
        }else{
            return view('student.registration');
        }
        
    }

    public function delete($id) {
        $student = Student::findOrFail($id);

        return view('student.delete', ['students' => $student]); 
    }

    public function update(Request $request) {
        $id = $request->input('id');
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
            return view('student.edit', ['students' => $p]);
        }
    }

    public function destroy($id) {
        $p = Student::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Student Deleted With Success');
        return redirect('/student');
    }

    public function enrollmentIndex()
    {
        $idU = auth()->user()->id;

        $id = Student::where('id_user', $idU)->get();

        if(!$id->isEmpty()){
            $enrollment = DB::table('enrollments')
            ->join('students', 'enrollments.id_student', '=', 'students.id')
            ->join('courses', 'enrollments.id_course', '=', 'courses.id')
            ->select('courses.name as course_name', 'students.name as student_name', 'enrollments.*')
            ->where('enrollments.id_student' , '=', $id[0]->id)->paginate(5);

            // $enrollment = Enrollment::with('student', 'course')->where('id_student' , $id[0]->id)->paginate(5);

            // 
 
            return view('student/enrollment.index', ['enrollment' => $enrollment]);
        }else{
            \Session::flash('status', 'You Need to have a Student Register');
            return view('student.registration');
        }

    }

    public function enrollmentNew()
    {

        $courses = Course::all();

        return view('student/enrollment.new', ['courses' => $courses]);
    }

    public function enrollmentStore(Request $request) 
    {
        $idU = auth()->user()->id;
        $id = Student::where('id_user', '=' ,$idU)->get();

        $p = new Enrollment;
        $p->id_student = $id[0]->id;
        $p->authorization = 0;
        $p->id_course = $request->input('id_course');
        
        if ($p->save()) {
            \Session::flash('status', 'Enrollment Registred With Sucess');
            return redirect('/student/enrollment');
        } else {
            \Session::flash('status', 'There Was an Error');
            return view('admin/enrollments/new');
        }
    }

    public function enrollmentEdit($id) 
    {
        $row = DB::table('enrollments')
            ->join('students', 'enrollments.id_student', '=', 'students.id')
            ->join('courses', 'enrollments.id_course', '=', 'courses.id')
            ->select('courses.name as course_name', 'students.name as student_name', 'enrollments.*')
            ->where('enrollments.id', '=', $id)->get();

        $courses = Course::all();

        return view('student/enrollment.edit', ['row' => $row, 'courses' => $courses]);
    }

    public function enrollmentUpdate(Request $request) 
    {
        $id = $request->input('id');
        $p = Enrollment::findOrFail($id);
        $p->id_course = $request->input('id_course');
        $p->authorization = 0;
        
        if ($p->save()) {
            \Session::flash('status', 'Enrollment Update With Success');
            return redirect('/student/enrollment');
        } else {
            \Session::flash('status', 'There was an Error');
            return view('student/enrollment.edit', ['enrollments' => $p]);
        }
    }

    public function enrollmentDelete($id) 
    {
        $p = Enrollment::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Enrollment Deleted With Success');
        return redirect('/student/enrollment');
    }
}
