<?php

namespace App\Http\Controllers;

use Validator;
use App\Http\Resources\Lesson as LessonResource;
use App\Http\Resources\CanceledLesson as CanceledLessonResource;
use App\Lesson;
use App\CanceledLesson;
use App\Classroom;
use App\Update;
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
        $Lesson = Lesson::create($request->all());
        return response()->json($Lesson, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $Lesson)
    {
        return new LessonResource($Lesson);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $Lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $Lesson)
    {
        $Lesson->update($request->all());
        return response()->json($Lesson, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $Lesson)
    {
        $Lesson->delete();
        return response()->json(null, 204);
    }

    /**
     * Annullamento di una lezione
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, Lesson $Lesson)
    {
        // NOTA : Per evitare redirect alla HomePage settare nella richiesta accept:application/json

        $request->validate([
            'date_lesson' => 'required|date_format:Y-m-d',
        ]);

        if(CanceledLesson::where('lesson_id', '=', $Lesson->id)->count() > 0){
            return response()->json('Lezione gia annullata in precendenza', 409);
        }

        $request->merge([
            'lesson_id' => $Lesson->id,
        ]);
        $CanceledLesson = CanceledLesson::create($request->all());
        return response()->json($CanceledLesson, 201);
    }

    /**
     * Cambio aula
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $Lesson
     * @param  \App\Classroom  $Classroom
     * @return \Illuminate\Http\Response
     */
    public function changeClassroom(Request $request, Lesson $Lesson, Classroom $Classroom)
    {
        if(is_null($Classroom)) {
            return response()->json("Aula non esistente nel sistema", 400);
        }

        if(is_null($Lesson)) {
            return response()->json("Lezione non esistente nel sistema", 400);
        }

        $Lesson->update([
            'classroom_id' => $Classroom->id,
        ]);

        // Creazione notifica
        /*
        $update = new Update;
        $teaching_name = Teaching::find($Lesson->teaching_id)->name;

        $update->teaching_id = $Lesson->teaching_id;
        $update->title = "Cambio di aula - " . $teaching_name;
        $update->info = "La lezione di " . $teaching_name . " del giorno " . 
        */
        return response()->json($Lesson, 200);
    }


    /**
     * Cambio orario
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lesson  $Lesson
     * @return \Illuminate\Http\Response
     */
    public function changeTime(Request $request, Lesson $Lesson)
    {
        if(is_null($Lesson)) {
            return response()->json("Lezione non esistente nel sistema", 400);
        }

        $request->validate([
            'start_time' => 'required|numeric',
            'duration' => 'required|numeric',
        ]);

        $Lesson->update([
            'start_time' => $request->start_time,
            'duration' => $request->duration,
        ]);

        return response()->json($Lesson, 200);
    }

    /**
     * Restituisce le lezioni annullate
     */
    public function getCanceledLessons(Request $request){
        return CanceledLessonResource::collection(CanceledLesson::all());
    }
}