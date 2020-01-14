<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Resources\Lesson as LessonResource;
use App\Lesson;
use App\canceled_lesson;
use App\Classroom;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LessonResource::collection(Lesson::paginate(15));
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
        $lesson = lesson::create($request->all());
        return response()->json($lesson, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(lesson $lesson)
    {
        return new LessonResource($lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, lesson $lesson)
    {
        $lesson->update($request->all());
        return response()->json($lesson, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(lesson $lesson)
    {
        $lesson->delete();
        return response()->json(null, 204);
    }

    /**
     * Annullamento di una lezione
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, lesson $lesson)
    {
        // NOTA : Per evitare redirect alla HomePage settare nella richiesta accept:application/json

        $request->validate([
            'date_lesson' => 'required|date_format:Y-m-d',
        ]);

        if(canceled_lesson::where('lesson_id', '=', $lesson->id)->count() > 0){
            return response()->json('Lezione gia annullata in precendenza', 409);
        }

        $request->merge([
            'lesson_id' => $lesson->id,
        ]);
        $canceled_lesson = canceled_lesson::create($request->all());
        return response()->json($canceled_lesson, 201);
    }

    /**
     * Cambio aula
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function changeClassroom(Request $request, lesson $lesson, classroom $classroom)
    {
        if(is_null($classroom)) {
            return response()->json("Aula non esistente nel sistema", 400);
        }

        if(is_null($lesson)) {
            return response()->json("Lezione non esistente nel sistema", 400);
        }

        $lesson->update([
            'classroom_id' => $classroom->id,
        ]);

        return response()->json($lesson, 200);
    }
}