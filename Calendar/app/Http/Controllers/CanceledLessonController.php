<?php

namespace App\Http\Controllers;

use App\Http\Resources\CanceledLesson as CanceledLessonResource;
use App\CanceledLesson;
use Illuminate\Http\Request;

class CanceledLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CanceledLessonResource::collection(CanceledLesson::paginate(15));
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
     * @param  \App\CanceledLesson  $CanceledLesson
     * @return \Illuminate\Http\Response
     */
    public function show(CanceledLesson $CanceledLesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CanceledLesson  $CanceledLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(CanceledLesson $CanceledLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CanceledLesson  $CanceledLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CanceledLesson $CanceledLesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CanceledLesson  $CanceledLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(CanceledLesson $CanceledLesson)
    {
        //
    }
}
