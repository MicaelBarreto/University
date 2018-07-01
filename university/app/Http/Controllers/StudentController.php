<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Student;
use App\User;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {

        $student = DB::table('students')->select('students.id','students.name' ,'students.CPF', 'students.RG', 'students.address', 'students.cellphone')->get();

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
       
        $p = $request->input('user_id');

        $id = DB::table('students')->select('students.id')->where('students.id_user', '=' ,$p)->get();
        
        echo $p;
        echo $id;
        dd($id);
        
        if($id){
            $student = Student::findOrFail($id);
            return view('student.edit', ['student' => $student]);
        }else{
            return view('student.registration');
        }
        
    }

    public function delete($id) {
        $student = Student::findOrFail($id);

        return view('student.delete', ['students' => $student]); 
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
            return view('student.edit', ['students' => $p]);
        }
    }

    public function destroy($id) {
        $p = Student::findOrFail($id);
        $p->delete();

        \Session::flash('status', 'Student Deleted With Success');
        return redirect('/student');
    }
}
