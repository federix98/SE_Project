<?php

namespace App\Http\Controllers;

use App\Http\Resources\Canceled_lesson as Canceled_lessonResource;
use App\Canceled_lesson;
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
        return Canceled_lessonResource::collection(Canceled_lesson::paginate(15));
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
     * @param  \App\canceled_lesson  $canceled_lesson
     * @return \Illuminate\Http\Response
     */
    public function show(canceled_lesson $canceled_lesson)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\canceled_lesson  $canceled_lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(canceled_lesson $canceled_lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\canceled_lesson  $canceled_lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, canceled_lesson $canceled_lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\canceled_lesson  $canceled_lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(canceled_lesson $canceled_lesson)
    {
        //
    }
}
