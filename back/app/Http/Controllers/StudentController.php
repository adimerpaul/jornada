<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;

class StudentController extends Controller{
    public function index(){
        return Student::all();
    }

    public function create(){
    }


    public function store(StoreStudentRequest $request){
    }


    public function show($ci){
        $student = Student::where('ci', $ci)->first();
        return $student;
    }


    public function edit(Student $student){
    }



    public function update(UpdateStudentRequest $request, Student $student){
    }


    public function destroy(Student $student){
    }
}
