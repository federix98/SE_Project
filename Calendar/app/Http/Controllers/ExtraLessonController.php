<?php

namespace App\Http\Controllers;

use App\Http\Resources\Extra_lesson as Extra_lessonResource;
use App\Extra_lesson;
use Illuminate\Http\Request;

class ExtraLessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Extra_lessonResource::collection(Extra_lesson::paginate(15));
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
     * @param  \App\extra_lesson  $extra_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(extra_lesson $extra_lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\extra_lesson  $extra_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(extra_lesson $extra_lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\extra_lesson  $extra_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, extra_lesson $extra_lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\extra_lesson  $extra_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(extra_lesson $extra_lesson)
    {
        //
    }
}
