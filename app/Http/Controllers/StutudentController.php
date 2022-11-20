<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stutudent;

class StutudentController extends Controller
{
    public function index()
    {
        $students = Stutudent::orderBy('id', 'DESC')->get();
        return view('student',compact('students'));
    }
    public function addstudent(Request $request)
    {
        $student = new Stutudent();
        $student->firstname = $request->firstname;
        $student->lastname = $request->lastname;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save(); 
        return response()->json($student, 200);
    }
}
