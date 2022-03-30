<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function index()
    {
      $students=Student::all();
      return view('Students.index',compact('students'));
    }
    public function Store(Request $request)
    {
      $request->validate([
          'name'=>"required",
          'email'=>'required|email',
          'password'=>'required'
      ]);

      $student=new Student();
      $student->name=$request->name;
      $student->email=$request->email;
      $student->password=Hash::make($request->password);
      $student->save();
      return back();
    }
}
