<?php

namespace App\Http\Controllers;

use App\Http\Resources\Classroom as ClassroomResource;
use App\Classroom;
use Illuminate\Http\Request;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClassroomResource::collection(Classroom::paginate(15));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $Classroom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function edit(Classroom $Classroom)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classroom $Classroom)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classroom $Classroom)
    {
        //
    }
}
