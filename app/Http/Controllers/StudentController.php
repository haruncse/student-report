<?php

namespace App\Http\Controllers;

use App\Models\student;
use App\Models\student_info;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student.student');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

            $request->validate([
                'name' => 'required|max:255',
                'father_name' => 'required|max:255',
                'mother_name' => 'required|max:255',
            ]);

            student::create($request->all());
            return student::all();

        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return $id;
        return $result = student::join('student_infos', 'students.id', '=', 'student_infos.student_id')
        ->get(['students.*','student_infos.blood_group']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(student $student)
    {
        //
    }

    public function getAllStudent(){
        return student::all();
    }

    public function addStudentInfo(Request $request){
        //return $request;
        $request->validate([
            'student_id' => 'required|max:255|unique:student_infos',
            'blood_group' => 'required|max:255',
        ]);

        try{
            student_info::create($request->all());
            return student_info::all();
        }catch(Exception $e){
            return $e->getMessage();
        }
        
    }
}
