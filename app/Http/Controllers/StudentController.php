<?php

namespace App\Http\Controllers;

use App\Http\Resources\StudentCollection;
use App\Http\Resources\StudentResource;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        return response()->json(
            new StudentCollection(Student::all()),
            Response::HTTP_OK // 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return StudentResource
     */
    public function store(Request $request)
    {
        $student = Student::create($request->only([
            'first_name', 'last_name', 'class', 'date_of_birth'
        ]));
        
        return new StudentResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return StudentResource
     */
    public function show(Student $student)
    {
        return response()->json(new StudentResource($student));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return StudentResource
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->only([
            'first_name', 'last_name', 'class', 'date_of_birth'
        ]));

        return new StudentResource($student);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); // 204
    }
}
