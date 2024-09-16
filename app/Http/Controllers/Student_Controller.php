<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Student;



class Student_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::all();
        return view('index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {

        $validateData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:students',
            'phone' => 'required',
            'section' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);


        $image = $request->file('image');
        $destinationPath = 'storage/images/';
        $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
        $image->move(public_path($destinationPath), $profileImage);


        $student = new Student();
        $student->name = $validateData['name'];
        $student->email = $validateData['email'];
        $student->phone = $validateData['phone'];
        $student->section = $validateData['section'];
        $student->image = $profileImage;
        $student->save();


        return redirect('/students')->with('success', 'Student added successfully!');
    }


}
