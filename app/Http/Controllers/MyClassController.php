<?php

namespace App\Http\Controllers;

use App\Http\Resources\MyClassCollection;
use App\Http\Resources\MyClassResource;
use App\Models\MyClass;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(
            new MyClassCollection(MyClass::all()),
            Response::HTTP_OK // 200
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $student = MyClass::create($request->only([
            'code', 'name', 'maximum_students', 'status', 'description'
        ]));
        
        return new MyClassResource($student);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return MyClassResource
     */
    public function show(MyClass $class)
    {
        return response()->json(new MyClassResource($class));
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MyClass  $myClass
     * @return MyClassResource
     */
    public function update(Request $request, MyClass $class)
    {
        $class->update($request->only([
            'code', 'name', 'maximum_students', 'status', 'description'
        ]));

        return new MyClassResource($class);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MyClass  $myClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(MyClass $class)
    {
        $class->delete();

        return response()->json(null, Response::HTTP_NO_CONTENT); // 204
    }
}
