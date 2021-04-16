<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function gotoCrudPage(){
        $students = Student::latest()->get();
        return view('crud', compact('students'));
    }

    // Store Student Data
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'roll' => 'required',
            'class' => 'required',
        ],[
            'name.required' => 'Please input valid name',
            'roll.required' => 'Please input valid roll',
            'class.required' => 'Please input valid class',
        ]);

        Student::insert([
            'name'=>$request->name,
            'roll'=>$request->roll,
            'class'=>$request->class,
        ]);

        return redirect()->back()->with('success', 'Successfully data added..');
    }

    // Student data edit
    public function edit($id){
        $student = Student::findOrFail($id);
        return view('edit', compact('student'));
    }

    // Update Student data
    public function update(Request $request, $id){
        Student::findOrFail($id)->update([
            'name'=>$request->name,
            'roll'=>$request->roll,
            'class'=>$request->class,
    ]);

    return redirect()->to('/crud')->with('update', 'Successfully data Updated..');
    }

    // Delete Student Data
    public function destroy($id){
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully delete data..');
    }
}
