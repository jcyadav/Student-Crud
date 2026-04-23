<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->search;

        $students = Student::when($search,function($q) use ($search){
            $q->where('name','like',"%$search%")
              ->orWhere('email','like',"%$search%");
        })->paginate(5);

        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:students',
            'phone'=>'required',
            'course'=>'required',
            'status'=>'required'
        ]);

        Student::create($request->all());

        return redirect()->route('students.index')->with('success','Data saved successfully!');
    }

    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request,Student $student)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:students,email,'.$student->id,
            'phone'=>'required',
            'course'=>'required',
            'status'=>'required'
        ]);

        $student->update($request->all());

        return redirect()->route('students.index')->with('success','Date updated successfully');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return back()->with('success','Deleted');
    }
}    
