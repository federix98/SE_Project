<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Http\Resources\ExtraLesson as ExtraLessonResource;
use App\ExtraLesson;
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
        return ExtraLessonResource::collection(ExtraLesson::paginate(15));
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
        $lesson = Lesson::create($request->all());

        return response()->json($lesson, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ExtraLesson  $ExtraLesson
     * @return \Illuminate\Http\Response
     */
    public function show(ExtraLesson $ExtraLesson)
    {
        return new ExtraLessonResource($ExtraLesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ExtraLesson  $ExtraLesson
     * @return \Illuminate\Http\Response
     */
    public function edit(ExtraLesson $ExtraLesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ExtraLesson  $ExtraLesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExtraLesson $ExtraLesson)
    {
        $ExtraLesson->update($request->all());
        return response()->json($ExtraLesson, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ExtraLesson  $ExtraLesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExtraLesson $ExtraLesson)
    {
        $ExtraLesson->delete();
        return response()->json(null, 204);
    }
}
